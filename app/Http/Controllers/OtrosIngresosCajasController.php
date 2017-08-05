<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtrosIngresosCaja;
use App\Caja;

class OtrosIngresosCajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = OtrosIngresosCaja::all();
        return view('admin.cajas.otrosIngresos.index')->with('ingresos',$ingresos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cajas.otrosIngresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new OtrosIngresosCaja($request->all());
        $ingreso->user_id = \Auth::user()->id;
        $ingreso->save();

        $caja = Caja::find($request->caja_id);
        $saldo_actual = $caja->saldo_actual;
        $nuevo_saldo = $saldo_actual + $request->valor;
        $caja->saldo_anterior = $saldo_actual;
        $caja->saldo_actual = $nuevo_saldo;
        $caja->save();

        flash('Ingreso por concepto de: '.$ingreso->concepto.' ejecutado con exito!!')->success();
        return redirect('/admin/cajas/otrosIngresos');
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
        $ingreso = OtrosIngresosCaja::find($id);
        $ingreso->delete();
        flash('Ingreso eliminado con exito!!')->success();
        return redirect('/admin/cajas/otrosIngresos');
    }
}
