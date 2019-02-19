<?php

use Illuminate\Database\Seeder;
use App\Documento;

class AjusteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Documento::create([
            'doc_codigo' => 'AJ-2',
            'doc_tipo' => "",
          // 'cat_nombre' => 'Smartphones',
        ]);



        $table->increments('doc_id');
        $table->integer('prv_id')->nullable();
        $table->string('doc_codigo', 50);
        $table->char('doc_tipo', 2);
        $table->date('doc_fecha');
        $table->timestamp('doc_created_at');
        $table->timestamp('doc_updated_at')->nullable();

        $table->foreign('prv_id')->references('prv_id')->on('inv_proveedores');
        $table->unique(['prv_id', 'doc_codigo', 'doc_tipo']);

    }
}