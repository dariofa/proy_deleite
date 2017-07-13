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

    
}
