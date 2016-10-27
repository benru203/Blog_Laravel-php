<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        //con esa linea creamos una tabla que relaciona de muchos a muchos los articulos y las etiquetas
        Schema::create('articulo_etiqueta',function(Blueprint $table){
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('etiqueta_id')->unsigned();
            $table->timestamps();

            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulo_etiqueta');
        Schema::drop('etiquetas');
    }
}
