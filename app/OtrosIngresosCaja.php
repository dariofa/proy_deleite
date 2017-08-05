<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosIngresosCaja extends Model
{
    protected $table = "otros_ingresos_cajas";

    protected $fillable = [
    		'concepto',
			'valor',
			'caja_id',
			'user_id'
		];
	public function caja(){
		
		return $this->belongsTo('App\Caja');
	}
	public function user(){
		
		return $this->belongsTo('App\User');
	}
}
