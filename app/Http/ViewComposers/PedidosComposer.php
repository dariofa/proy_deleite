<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ProductoTienda;
use App\Cliente;
use App\Caja;


/**
* 
*/
class PedidosComposer
{
	
	public function compose(View $view)
	{
		
		$productos_tienda = ProductoTienda::all();
		$cajas = Caja::pluck('nombre','id');	
		$view->with(['productos_tienda'=>$productos_tienda])
			->with(['cajas'=>$cajas]);
	}
}


