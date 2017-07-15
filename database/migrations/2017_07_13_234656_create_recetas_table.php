<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });

        //Tabla pivote
        Schema::create('productos_recetas', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('cantidad_gr');
            $table->string('cantidad_kg');

            $table->integer('producto_bodega_id')->unsigned();
            $table->foreign('producto_bodega_id')->references('id')->on('productos_bodega')->onDelete('cascade'); 
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade'); 
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
        Schema::dropIfExists('recetas');
        Schema::dropIfExists('productos_recetas');
    }
}
