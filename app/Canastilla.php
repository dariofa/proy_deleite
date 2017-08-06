<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canastilla extends Model
{
   protected $table = "canastillas";

   protected $fillable = [
   			'descripcion',
   			'cantidad'
  		];

  	public function clientes(){
    return $this->belongsToMany('App\Cliente','canastillas_clientes')->withPivot('cantidad_prestadas','canastilla_id','cliente_id')->withTimestamps();
	}
}

