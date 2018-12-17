<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_proveedores', function (Blueprint $table) {
            $table->increments('prv_id');
            $table->string('prv_codigo',10)->unique();
            $table->string('prv_nombre',100)->unique();
            $table->string('prv_descripcion',100);
            $table->string('prv_identificacion',13)->unique();
            $table->string('prv_tipo_identificacion',20);
            $table->string('prv_direccion',100);
            $table->string('prv_telefono',10)->nullable();
            $table->string('prv_celular',10)->nullable();
            $table->string('prv_email',50)->unique();
            $table->boolean('prv_estado');
            $table->timestamp('prv_created_at');
            $table->timestamp('prv_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_proveedores');
    }
}
