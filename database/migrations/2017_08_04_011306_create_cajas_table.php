<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('saldo_actual');
            $table->integer('saldo_anterior');
            $table->timestamps();
        });

        Schema::create('egresos_cajas', function(Blueprint $table){
            $table->increments('id');
            //$table->string('concepto');
            $table->integer('valor');
            $table->integer('caja_id')->unsigned();
            $table->foreign('caja_id')->references('id')->on('cajas')->onDelete('cascade');
            $table->integer('producto_bodega_id')->unsigned();
            $table->foreign('producto_bodega_id')->references('id')->on('productos_bodega')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        //Tabla pivote ingresos
        Schema::create('ingresos_cajas', function(Blueprint $table){
            $table->increments('id');
            //$table->string('concepto');
            $table->integer('valor');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->integer('caja_id')->unsigned();
            $table->foreign('caja_id')->references('id')->on('cajas')->onDelete('cascade');
            //$table->integer('pedido_id')->unsigned();
           // $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('cajas');
        Schema::dropIfExists('egresos_cajas'); 
        Schema::dropIfExists('ingresos_cajas'); 
    }
}
