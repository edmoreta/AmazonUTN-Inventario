<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_movimientos', function (Blueprint $table) {
            $table->increments('mov_id');
            $table->integer('pro_id');
            $table->integer('doc_id');
            $table->integer('mov_cantidad');
            $table->double('mov_costo',10,2);
            $table->double('mov_precio', 10, 2);
            $table->boolean('mov_estado');
            $table->foreign('pro_id')->references('pro_id')->on('inv_productos');
            $table->foreign('doc_id')->references('doc_id')->on('inv_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_movimientos');
    }
}
