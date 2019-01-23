<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_productos', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->integer('cat_id');
            $table->string('pro_codigo',10)->unique();
            $table->string('pro_nombre',200);
            $table->string('pro_descripcion',300);
            $table->text('pro_caracteristicas');
            $table->double('pro_costo', 10, 2);
            $table->double('pro_precio', 10, 2);            
            $table->integer('pro_stock')->default(0);
            $table->boolean('pro_estado')->default(1);
            $table->string('pro_foto',255)->nullable();
            $table->timestamp('pro_created_at');
            $table->timestamp('pro_updated_at');
            $table->foreign('cat_id')->references('cat_id')->on('inv_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_productos');
    }
}
