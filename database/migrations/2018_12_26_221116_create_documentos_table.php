<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_documentos', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->integer('prv_id');
            $table->string('doc_codigo',10);
            $table->char('doc_tipo',2);
            $table->timestamp('doc_fecha');
            $table->boolean('doc_estado');
            
            $table->foreign('prv_id')->references('prv_id')->on('inv_proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_documentos');
    }
}
