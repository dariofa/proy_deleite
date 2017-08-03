<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtrosEgresoscaja;
use App\Caja;

class OtrosEgresosCajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egresos = OtrosEgresoscaja::all();
        return view('admin.cajas.otrosEgresos.index')->with('egresos',$egresos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cajas.otrosEgresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $egreso = new OtrosEgresoscaja($request->all());
        $egreso->user_id = \Auth::user()->id;
        $egreso->save();

        $caja = Caja::find($request->caja_id);
        $saldo_actual = $caja->saldo_actual;
        $nuevo_saldo = $saldo_actual - $request->precio;
        $caja->saldo_anterior = $saldo_actual;
        $caja->saldo_actual = $nuevo_saldo;
        $caja->save();

        flash('Egreso por concepto de: '.$egreso->concepto.' ejecutado con exito!!')->success();
        return redirect('/admin/cajas/otrosEgresos');
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
        //
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
}
