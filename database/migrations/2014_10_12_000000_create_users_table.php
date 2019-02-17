<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_usuarios', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->string('usu_email',50)->unique();
            $table->string('usu_cedula',10)->unique();
            $table->string('usu_nombre',50);
            $table->string('usu_apellido',50);
            $table->date('usu_fechaN',50);
            $table->string('usu_direccion',100)->nullable();
            $table->string('usu_telefono',10)->nullable();
            $table->string('usu_celular',10);                        
            $table->string('usu_foto', 250)->nullable();
            $table->string('usu_password');
            $table->boolean('usu_estado')->default(1);            
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('usu_created_at');
            $table->timestamp('usu_updated_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_usuarios');
    }
}
