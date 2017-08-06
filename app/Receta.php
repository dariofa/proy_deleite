<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'recetas';

    protected $fillable =[
    	'nombre',
    	'descripcion'
    ];

    public function productos(){
    return $this->belongsToMany('App\ProductoBodega','productos_recetas')->withPivot('cantidad_kg','cantidad_gr','producto_bodega_id','receta_id')->withTimestamps();
    }

    public function tienda(){
    	return $this->hasOne('App\ProductoTienda');
    }
}
