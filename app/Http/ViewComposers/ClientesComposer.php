<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Canastilla;


/**
* 
*/
class ClientesComposer
{
	
	public function compose(View $view)
	{
		$canastillas = Canastilla::pluck('descripcion','id');
		
		$view->with(['canastillas'=>$canastillas]);
	}
}


