<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inv_proveedores')->insert([
            'prv_codigo' => 'PRV-1',
            'prv_nombre' => 'Proveedor Uno',
            'prv_descripcion' => 'Proveedor de PCs',
            'prv_identificacion' => '1002003001',
            'prv_tipo_identificacion' => 'CI',
            'prv_direccion' => 'Ibarra',
            'prv_telefono' => '062458956',
            'prv_celular' => '0986564839',
            'prv_email' => 'proveedo1@hotmail.com',
            'prv_created_at' => Carbon::now(),
            'prv_updated_at' => Carbon::now()
        ]);

        DB::table('inv_proveedores')->insert([
            'prv_codigo' => 'PRV-2',
            'prv_nombre' => 'Proveedor Dos',
            'prv_descripcion' => 'Proveedor de Pantallas',
            'prv_identificacion' => '1790011674001',
            'prv_tipo_identificacion' => 'RUC',
            'prv_direccion' => 'Quito',
            'prv_telefono' => '028546982',
            'prv_celular' => '0901200598',
            'prv_email' => 'proveedo2@hotmail.com',
            'prv_created_at' => Carbon::now(),
            'prv_updated_at' => Carbon::now()
        ]);

        DB::table('inv_proveedores')->insert([
            'prv_codigo' => 'PRV-3',
            'prv_nombre' => 'Proveedor Tres',
            'prv_descripcion' => 'Proveedor de Televisores',
            'prv_identificacion' => '0401939277',
            'prv_tipo_identificacion' => 'CI',
            'prv_direccion' => 'Tulcán',
            'prv_telefono' => '064250096',
            'prv_celular' => '0959846598',
            'prv_email' => 'proveedo3@hotmail.com',
            'prv_created_at' => Carbon::now(),
            'prv_updated_at' => Carbon::now()
        ]);
    }
}
