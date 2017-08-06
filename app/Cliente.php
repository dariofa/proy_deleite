<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

	protected $fillable = [
			'nombre',
			'direccion',
			'telefono',
			'descuento'	
		];

    public function canastillas(){
    return $this->belongsToMany('App\Canastilla','canastillas_clientes')->withPivot('cantidad_prestadas','canastilla_id','cliente_id')->withTimestamps();
    }
}
