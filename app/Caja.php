<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = "cajas";

    protected $fillable = [
    		'nombre',
			'saldo_actual',
			'saldo_anterior'	
		];
	public function egresos_caja(){
		
		return $this->belongsToMany('App\ProductoBodega','egresos_caja')->withPivot('producto_bodega_id','caja_id','user_id','valor')->withTimestamps();
	}
	public function ingresos_caja(){
		
		return $this->belongsToMany('App\Pedido','ingresos_caja')->withPivot('pedido_id','caja_id','user_id','valor')->withTimestamps();
	}
	public function otros_egresos_caja(){
		
		return $this->hasMany('App\OtrosEgresosCaja');
	}
	public function otros_ingresos_caja(){
		
		return $this->hasMany('App\OtrosEgresosCaja');
	}
}
