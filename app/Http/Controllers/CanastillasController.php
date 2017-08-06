<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Canastilla;
use App\Cliente;
use Laracasts\Flash\Flash;

class CanastillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canastillas = Canastilla::orderBy('id','ASC')->paginate(10);
        return view('admin.canastillas.index',['canastillas'=>$canastillas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.canastillas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $canastilla = new Canastilla($request->all());
        $canastilla->save();
        Flash::success('Canastilla(s) registrado con exito');
        return redirect('/admin/canastillas/create'); 
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
        $canastilla = Canastilla::find($id);
        return view('admin.canastillas.edit',['canastilla'=>$canastilla]);
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
        $canastilla = Canastilla::find($id);
        $canastilla->fill($request->all());
        $canastilla->save();
        Flash::success('Canastilla(s)  actualizado con exito');        
        return redirect('/admin/canastillas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $canastilla = Canastilla::find($id);
         $canastilla->delete();
         Flash::success('Canastilla(s) eliminado con exito');
        return redirect('/admin/canastillas/');
    }

    public function assign(Request $request)
    {
        $canastilla = Canastilla::find($request->canastilla_id);      
        $canastilla->clientes()->attach($request->id,[
                        'cantidad_prestadas'=>$request->cantidad,
                ]);
        $canastilla->cantidad = ($canastilla->cantidad - $request->cantidad);
        $canastilla->save();
        return redirect('/admin/clientes');
       // return view('admin.canastillas.asigned', ['canastilla'=>$canastilla]);

    }
}
