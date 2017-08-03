<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";

    protected $fillable = [
    		'valor_neto',
			'fecha_pedido',
			'estado',
			'cliente_id',
			'user_id'	
		];
	 public function ingresos_cajas(){
		
		return $this->belongsToMany('App\Caja','ingresos_cajas')->withPivot('pedido_id','caja_id','user_id','valor')->withTimestamps();
	}
}
