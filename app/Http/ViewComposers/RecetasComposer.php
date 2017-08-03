<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ProductoBodega;


/**
* 
*/
class RecetasComposer
{
	
	public function compose(View $view)
	{
		$productos_bodega = ProductoBodega::all();		
		$view->with(['productos_bodega'=>$productos_bodega]);
	}
}


