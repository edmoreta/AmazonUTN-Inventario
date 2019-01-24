<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inv_usuarios')->insert([
            'usu_cedula' => '1002003001',
            'usu_nombre' => 'SuperAdm',
            'usu_apellido' => 'Root',
            'usu_fechaN' => '1999/01/01',
            'usu_direccion' => 'Ibarra',
            'usu_telefono' => '091234567',
            'usu_celular' => '0912345678',
            'usu_email' => 'root@hotmail.com',
            'usu_password' => bcrypt('12345678'),
            'usu_created_at' => Carbon::now(),
            'usu_updated_at' => Carbon::now()
        ]);
        DB::table('inv_usuarios')->insert([
            'usu_cedula' => '1004003456',
            'usu_nombre' => 'Admin',
            'usu_apellido' => 'usuario',
            'usu_fechaN' => '1998/11/13',
            'usu_direccion' => 'Otavlo',
            'usu_telefono' => '087654312',
            'usu_celular' => '0898653425',
            'usu_email' => 'admin@hotmail.com',
            'usu_password' => bcrypt('12345678'),
            'usu_created_at' => Carbon::now(),
            'usu_updated_at' => Carbon::now()
        ]);
        DB::table('inv_usuarios')->insert([
            'usu_cedula' => '107634953',
            'usu_nombre' => 'Bodeguero',
            'usu_apellido' => 'usuario',
            'usu_fechaN' => '1992/1/3',
            'usu_direccion' => 'Quito',
            'usu_telefono' => '0987654321',
            'usu_celular' => '0934543234',
            'usu_email' => 'bodeguero@hotmail.com',
            'usu_password' => bcrypt('12345678'),
            'usu_created_at' => Carbon::now(),
            'usu_updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'root',
            'display_name' => 'Root',
            'description' => 'Super Admin del sistema de inventario',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'administrador',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sistema de inventario',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'bodeguero',
            'display_name' => 'Bodeguero',
            'description' => 'Usuario bodeguero del sistema de inventario',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'usu_id' => '1',
            'id' => '1',
        ]);
        DB::table('role_user')->insert([
            'usu_id' => '2',
            'id' => '2',
        ]);
        DB::table('role_user')->insert([
            'usu_id' => '3',
            'id' => '3',
        ]);
    }
}
