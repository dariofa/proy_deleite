<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoBodega;
use Laracasts\Flash\Flash;

class ProductosBodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos_bodega = ProductoBodega::orderBy('id','ASC')->paginate(10);
        return view('admin.bodega.productos.index',['productos_bodega'=>$productos_bodega]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bodega.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new ProductoBodega($request->all());
        $producto->save();
        Flash::success('Producto: '.$producto->nombre.' registrado con exito');
        return redirect('/admin/bodega/producto/crear');
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
        $producto_bodega = ProductoBodega::find($id);
        return view('admin.bodega.productos.edit',['producto_bodega'=>$producto_bodega]);
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
        //
    }

    public function stockUpdate(Request $request){
            $producto_bodega = ProductoBodega::find($request->id);
            $gr_actual = $producto_bodega->peso_gr;
            $kg_actual = $producto_bodega->peso_kg;

            $new_gr = $producto_bodega->peso_gr + $request->peso_gr;
            $new_kg = $producto_bodega->peso_kg + $request->peso_kg;

            $producto_bodega->peso_gr = $new_gr;
            $producto_bodega->peso_kg = $new_kg;
            $producto_bodega->save();
            Flash::success('Producto: '.$producto_bodega->nombre.' actualizado con exito');
        
            return redirect('/admin/bodega/producto/');
            
    }
}
