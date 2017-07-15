<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoBodega extends Model
{
	protected $table = "productos_bodega";

	protected $fillable = [
			'nombre',
			'precio',
			'peso_kg',
			'peso_gr',
			'descripcion'
		];

    public function recetas(){
    return $this->belongsToMany('App\Receta','productos_recetas')->withPivot('cantidad_kg','cantidad_gr','producto_bodega_id','receta_id')->withTimestamps();
    }
}
