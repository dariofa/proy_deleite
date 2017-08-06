<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Pedido;
use Laracasts\Flash\Flash;
use App\ProductoTienda;
use App\Caja;
class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('estado','<>','entregado')->get();
       return view('admin.tienda.pedidos.index',['pedidos'=>$pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $cliente = Cliente::find($id);
        return view('admin.tienda.pedidos.create',['cliente'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       ///dd($request->all());
        $pedido = new Pedido($request->all());
        $pedido->estado = 'preparando';
        $pedido->save();
            foreach ($request->productos as $id_p => $producto) {
                foreach ($request->cantidad as $id_c => $cantidad) {                    
                    if ($id_p == $id_c) {

                        $pedido->productos()->attach($producto,[
                        'valor'=>$request->cantidad[$id_c],
                        'cantidad_aprox'=>($request->cantAprox[$id_c])
                        ]); 
                        
                    }


                }
            }

             
         flash::success('El pedido fue creado con éxito...');
        return redirect('/admin/tienda/pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        //dd($pedido);
        if (!is_null($pedido) and $pedido->estado != 'entregado') {
            return view('admin.tienda.pedidos.show',['pedido'=>$pedido]);
        }
        if ($pedido->estado == 'entregado') {
            return view('admin.tienda.pedidos.view',['pedido'=>$pedido]);
        }
        return view('vendor.adminlte.errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        return view('admin.tienda.pedidos.edit',['pedido'=>$pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        Flash::info('<i class="fa fa-info-circle"></i> El pedido fue eliminado con éxito...');
        return redirect('/admin/tienda/pedidos/');
    }

    public function updateProduct(Request $request){
        $pedido = Pedido::find($request->id);
        $pedido->valor = $request->valor_total_pedido;
        $pedido->save();
        $valor = $pedido->productos()->where('producto_tienda_id','=',$request->producto_id)->first();
        $valor->pivot->cantidad_aprox = ($request->cantAprox);
        $valor->pivot->valor = ($request->valor);
        //$gramos->pivot->cantidad_kg = ($request->gramos/1000);
        $valor->pivot->save();
        return response()->json($pedido);
    }
    public function addProduct(Request $request){

        $pedido = Pedido::find($request->id);
        $busqueda = $pedido->productos()->where('producto_tienda_id','=',$request->producto_id)->get();
        $num = count($busqueda);
        if ($num <= 0) {
            $pedido->productos()->attach($request->producto_id,[
                        'cantidad_aprox'=>$request->cantAprox,
                        'valor'=>($request->valor)//asignacion en tabla pivote
        ]);
        $newVal = $pedido->productos()->where('pedido_id','=',$request->id)->sum('valor');
        $pedido->valor = $newVal;
        $pedido->save();
            $mensaje = ['mensaje'=>'Informacion agregada','encontrado'=>false];
        }else{
             $mensaje = ['mensaje'=>'El ingrediente ya existe','encontrado'=>true];
        }         

         return response()->json($mensaje);


    }
    public function destroyProd($id_pro,$id_ped){

        $pedido = Pedido::find($id_ped);
        $pedido->productos()->detach($id_pro);
        $newVal = $pedido->productos()->where('pedido_id','=',$id_ped)->sum('valor');
        $pedido->valor = $newVal;
        $pedido->save();
        Flash::info('<i class="fa fa-info-circle"></i> El producto fue eliminado con éxito...');
        return redirect('/admin/tienda/pedidos/edit/'.$id_ped);


    }
    public function deliver(Request $request){
                     
                foreach ($request->cantAprox as $id_cA => $cantidad) {
                foreach ($request->producto_id as $id_p => $producto) {                    
                    if ($id_cA == $id_p) {
                        $producto_tienda = ProductoTienda::find($producto);
                        $stockAc = $producto_tienda->stock;
                        $newStock = $stockAc - $cantidad;
                        $producto_tienda->stock = $newStock;
                        $producto_tienda->save();                       
                    }
                }
                }
           $pedido = Pedido::find($request->pedido_id);
           $pedido->estado = 'entregado';
           $pedido->ingresos_cajas()->attach($request->caja_id,[
                'user_id'=> \Auth::user()->id,
                'valor'=>$request->valor_total_pedido
            ]);   
          $pedido->save();
          $caja = Caja::find($request->caja_id);
           $saldoAct = $caja->saldo_actual;
           $newSaldo = $saldoAct + $request->valor_total_pedido;
           $caja->saldo_anterior =  $saldoAct;
           $caja->saldo_actual = $newSaldo;
           $caja->save();
           Flash::success('Producto actualizado con éxito...');
           return redirect('/admin/tienda/pedidos');



        }

}
