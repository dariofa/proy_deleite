<?php 
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Caja;
/**
* 
*/
class ProductosComposer
{
	
	public function compose(View $view)
	{
		$cajas = Caja::pluck('nombre','id');	
		$view->with(['cajas'=>$cajas]);
	}
}