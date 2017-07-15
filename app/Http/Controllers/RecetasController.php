<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoBodega;
use App\Receta;
use Laracasts\Flash\Flash;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::orderBy('id','ASC')->paginate(10);
        return view('admin.recetas.index',['recetas'=>$recetas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function getProductos(){
    $productos_bodega = ProductoBodega::all();
    return $productos_bodega;
}

    public function create()
    {
        $productos_bodega = $this->getProductos();
       
        return view('admin.recetas.create',['productos_bodega'=>$productos_bodega]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $receta = new Receta($request->all());
            $receta->save();
            foreach ($request->productos as $id_p => $producto) {
                foreach ($request->gramos as $id_g => $gramo) {
                    
                    if ($id_p == $id_g) {
                        $receta->productos()->attach($producto,[
                        'cantidad_gr'=>$gramo,
                        'cantidad_kg'=>($gramo/1000)
                        ]);
                        
                    }


                }
            }
          flash::success('La receta fue creada con exito...');
         return redirect('/admin/recetas/create');
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
        $productos_bodega = $this->getProductos();
        $receta = Receta::find($id);
        return view('admin.recetas.edit',['receta'=>$receta,'productos_bodega'=>$productos_bodega]);
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
        
        $receta = Receta::find($request->id);
        $receta->fill($request->all());
        $receta->save();
        Flash::success('Receta actualizada con éxito...');
        return redirect('/admin/recetas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        //
    }

    public function productUpdate(Request $request){
        $receta = Receta::find($request->id);
        $gramos = $receta->productos()->where('producto_bodega_id','=',$request->codigo)->first();
        $gramos->pivot->cantidad_gr = $request->gramos;
        $gramos->pivot->cantidad_kg = ($request->gramos/1000);
        //$gramos->pivot->cantidad_kg = ($request->gramos/1000);
        $gramos->pivot->save();
        return response()->json($receta);
    }

    public function productAdd(Request $request){
        $receta = Receta::find($request->receta_id);
        $busqueda = $receta->productos()->where('producto_bodega_id','=',$request->producto_id)->get();
        $num = count($busqueda);
        if ($num <= 0) {
            $receta->productos()->attach($request->producto_id,[
                        'cantidad_gr'=>$request->gramos,
                        'cantidad_kg'=>($request->gramos/1000)
        ]);
            $mensaje = ['mensaje'=>'Informacion agregada','encontrado'=>false];
        }else{
             $mensaje = ['mensaje'=>'El ingrediente ya existe','encontrado'=>true];
        }
         

         return response()->json($mensaje);
    }

    public function prodDelete($id_rec,$id_prod){

        $receta = Receta::find($id_rec);
         $receta->productos()->detach($id_prod);
return redirect('/admin/recetas/edit/'.$id_rec);

    }
}
