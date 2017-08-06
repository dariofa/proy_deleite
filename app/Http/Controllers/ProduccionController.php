<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\ProductoTienda;
use Illuminate\Support\Facades\DB;

class ProduccionController extends Controller
{
    public function index(){   	

    	$pedidos = DB::table('productos_pedido')
    	->join('productos_tienda', 'productos_tienda.id', '=', 'productos_pedido.producto_tienda_id')
    	->join('recetas', 'recetas.id', '=', 'productos_tienda.receta_id')
                ->select('producto_tienda_id','estado','cantidad_prod','recetas.nombre', DB::raw('SUM(valor) as total'), DB::raw('SUM(cantidad_aprox) as cantidad'))
                ->groupBy('producto_tienda_id')
              // ->where('pedido.estado','<>','producido')
                ->whereDate('productos_pedido.created_at',date('Y-m-d')) 
                ->get();
    	
//dd($pedidos);
    	return view('admin.tienda.produccion.index',['pedidos'=>$pedidos]);
    }

    public function updateProducido(Request $request){

        $pedido = DB::table('productos_pedido')->whereDate('created_at',date('Y-m-d'))->where('producto_tienda_id', $request->producto_tienda_id)->first();
        $stock_ant = $pedido->cantidad_prod;

        $producto_tienda = ProductoTienda::find($request->producto_tienda_id);        
        $stockActual = $producto_tienda->stock;
        $producto_tienda->stock = $stockActual - $stock_ant;
        $producto_tienda->save();

        $producto_tienda = ProductoTienda::find($request->producto_tienda_id);        
        $stockActual = $producto_tienda->stock;
        $producto_tienda->stock = $stockActual + $request->new_stock;
        $producto_tienda->save();
         $pedidos = DB::table('productos_pedido')
            ->where('producto_tienda_id', $request->producto_tienda_id)
            ->whereDate('productos_pedido.created_at',date('Y-m-d'))                 
            ->update(['estado' => 'producido','cantidad_prod'=>$request->new_stock,'cantidad_act'=>$stock_ant]);
            return response()->json($producto_tienda);
    }
}
