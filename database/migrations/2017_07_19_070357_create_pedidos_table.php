<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_factura');
            $table->string('valor');
            $table->string('fecha');
            $table->string('estado');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            
            $table->timestamps();
        });

        //Tabla pivote
        Schema::create('productos_pedido', function(Blueprint $table){
             $table->string('valor');
             $table->string('cantidad_aprox');
             $table->string('estado');
             $table->string('cantidad_prod');
             $table->string('cantidad_act');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->integer('producto_tienda_id')->unsigned();
            $table->foreign('producto_tienda_id')->references('id')->on('productos_tienda')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
