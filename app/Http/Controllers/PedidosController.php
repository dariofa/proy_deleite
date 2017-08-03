<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Caja;
use Laracast\Flash\Flash;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('admin.pedidos.index')->with('pedidos',$pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pedidos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->all());
        $pedido = new Pedido($request->all());
        $pedido->user_id = \Auth::user()->id;
        $pedido->save();
        $pedido->ingresos_cajas()->attach($request->caja_id,[
                        'user_id'=>\Auth::user()->id,
                        'valor'  =>$request->valor_neto
                        ]);
        $caja = Caja::find($request->caja_id);
        $saldo_actual = $caja->saldo_actual;
        $nuevo_saldo = $saldo_actual + $request->valor_neto;
        $caja->saldo_anterior = $saldo_actual;
        $caja->saldo_actual = $nuevo_saldo;
        $caja->save();

        flash('Pedido creado con exito!!')->success();
        return redirect('/admin/pedidos');
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
