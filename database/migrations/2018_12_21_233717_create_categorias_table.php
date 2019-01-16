<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_categorias', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_codigo',10)->unique();
            $table->integer('cat_codigop')->nullable();
            $table->string('cat_nombre',100)->unique();
            $table->boolean('cat_estado')->default(1);
            $table->timestamp('cat_created_at');
            $table->timestamp('cat_updated_at');
            $table->foreign('cat_codigop')->references('cat_id')->on('inv_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_categorias');
    }
}
