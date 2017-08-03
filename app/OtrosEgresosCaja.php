<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosEgresosCaja extends Model
{
    protected $table = "otros_egresos_cajas";

    protected $fillable = [
    		'concepto',
			'valor',
			'caja_id',
			'user_id'
		];
	public function caja(){
		
		return $this->belongsTo('App\Caja');
	}
}
