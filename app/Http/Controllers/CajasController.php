<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Caja;
use Laracast\Flash\Flash;

class CajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cajas = Caja::all();
       return view('admin.cajas.index')->with('cajas',$cajas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cajas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caja = new Caja($request->all());
        $caja->save();
        flash('Caja'.$caja->name.' ha sido creada con exito!!')->success();
        return redirect('/admin/cajas');
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
        $cajas = Caja::find($id);
        return view('admin.cajas.edit',['cajas'=>$cajas]);
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
        $caja = Caja::find($id);
        $caja->fill($request->all());
        $caja->save();
       flash('Caja actualizada con exito!!')->success();      
        return redirect('/admin/cajas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caja = Caja::find($id);
        $caja->delete();
        Flash::success('Caja: '.$caja->nombre.' eliminada con exito');
        return redirect('/admin/cajas/');
    }

    public function showMov($id){

        $caja = Caja::find($id);
        return view('admin.cajas.movimientos.index',['caja'=>$caja]);

    }
}
