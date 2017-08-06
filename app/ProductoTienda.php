<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoTienda extends Model
{
   protected $table = 'productos_tienda'; 
    protected $fillable = [
    	'nombre',
    	'precio',
    	'descripcion',
    	'receta_id',
        'stock'
    ];

    public function receta(){
    	return $this->belongsTo('App\Receta','receta_id');
    }

    public function pedidos(){
    return $this->belongsToMany('App\Pedido','productos_pedido')->withPivot('valor','cantidad_aprox','pedido_id','producto_tienda_id')->withTimestamps();
    }
}
