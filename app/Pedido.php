<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
    		'valor',
            'num_factura',
    		'fecha',
    		'estado',
    		'user_id',
    		'cliente_id'

    ];

    public function productos(){
    return $this->belongsToMany('App\ProductoTienda','productos_pedido')->withPivot('valor','cantidad_aprox','pedido_id','producto_tienda_id')->withTimestamps();
    }

    public function users(){
    return $this->belongsToMany('App\User','ingresos_cajas')->withPivot('valor','pedido_id','caja_id','user_id')->withTimestamps();
    }

    public function ingresos_cajas(){
    return $this->belongsToMany('App\Caja','ingresos_cajas')->withPivot('valor','pedido_id','caja_id','user_id')->withTimestamps();
    }
    public function cliente(){
            return $this->belongsTo('App\Cliente','cliente_id');
    }


}
