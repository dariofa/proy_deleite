<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Caja;
use App\Cliente;


/**
* 
*/
class PedidosComposer
{
	
	public function compose(View $view)
	{
		$cajas = Caja::pluck('nombre','id');	
		$view->with(['cajas'=>$cajas]);
		$clientes = Cliente::pluck('nombre','id');
		$view->with(['clientes'=>$clientes]);
	}
}
