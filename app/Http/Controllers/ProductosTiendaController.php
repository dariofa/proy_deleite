<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Receta;
use App\ProductoTienda;
use App\ProductoBodega;
class ProductosTiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos_tienda = ProductoTienda::orderBy('id','asc')->paginate(10);
        return  view('admin.tienda.producto.index',['productos_tienda'=>$productos_tienda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recetas = Receta::orderBy('nombre','Asc')->pluck('nombre','id');
        return view('admin.tienda.producto.create',['recetas'=>$recetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $receta = ProductoTienda::where('receta_id','=',$request->receta_id)->get();
        
        if (count($receta)>0) {
           Flash::info('<i class="fa fa-info-circle"></i> La receta ya existe...');
            return redirect('/admin/tienda/producto/create');
        }
        $receta = new ProductoTienda($request->all());
        $receta->save();
        Flash::success('La receta fue agregada con exito');
        return redirect('/admin/tienda/producto/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto_tienda = ProductoTienda::find($id);
        $recetas = Receta::orderBy('nombre','Asc')->pluck('nombre','id');
        return view('admin.tienda.producto.edit',['producto_tienda'=>$producto_tienda,'recetas'=>$recetas]);
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
        $producto_tienda = ProductoTienda::find($id);
        $producto_tienda->fill($request->all());
        $producto_tienda->save();
        //dd($request->all());
        Flash::success('El producto fue actualizado con éxito');
        return redirect('admin/tienda');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto_tienda = ProductoTienda::find($id);
        $producto_tienda->delete();

        flash('Producto eliminado con éxito...')->success();
        return redirect('admin/tienda/');
    }

     public function addStock(Request $request)
    {
        //dd($request->all());
        $producto_tienda = ProductoTienda::find($request->id);
        $stockAc = intval($producto_tienda->stock);
        $Newstock = ($stockAc + intval($request->stock));
        $producto_tienda->stock = $Newstock;
        
        //dd($request->stock);
        foreach ($producto_tienda->receta->productos as $key => $value) {
                 $producto_bodega = ProductoBodega::find($value->pivot->producto_bodega_id);
                 $peso_grActual =  $producto_bodega->peso_gr;
                 $cambio = ($request->stock * $value->pivot->cantidad_gr);                 
                 if ($request->pedido_cantidad) {
                   $cambio = ($request->pedido_cantidad * $value->pivot->cantidad_gr);                  
                 }
                 $newPeso_gr = ($peso_grActual - $cambio);
                 $producto_bodega->peso_gr = $newPeso_gr;
                 $producto_bodega->peso_kg = ($newPeso_gr / 1000);
                 if ($newPeso_gr > 0) {
                    $producto_tienda->save();
                    $producto_bodega->save();
                 }else{
                    if (!$request->ajax()) {
                        flash('Lo sentimos, la existencia de un producto en <b>BODEGA:: '.$producto_bodega->nombre.'</b> llego a cero.<br> <b>NO</b> se actualizo el stock<br>Existencia actual:: <b>'.$peso_grActual.'/gr</b><br>El pedido necesita <b>'.$cambio.'/gr</b>')->important();                    
                    return redirect('/admin/tienda');
                    }else{

                        return response()->json(false);
                    }
                    
                }
                 
                             
        }

        if (!$request->ajax()) {
        Flash::success('Stock actualizado con éxito');
        return redirect('/admin/tienda');
                    }else{
         $pedidos = DB::table('productos_pedido')
            ->where('producto_tienda_id', $request->id)
            ->update(['estado' => 'producido','cantidad_prod'=>$request->stock,'cantidad_act'=>$stockAc]); 
                        return response()->json($producto_tienda);
                    }
        

    }

    public function search(Request $request){
        $productos_tienda = ProductoTienda::all();
        $productos_tienda->each(function($productos_tienda){
            $productos_tienda->receta;

        });
        return response()->json($productos_tienda);
    }
     public function find(Request $request){
        $producto_tienda = ProductoTienda::find($request->id);        
        return response()->json($producto_tienda);
    }
}
