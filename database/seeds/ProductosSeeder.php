<?php

use Illuminate\Database\Seeder;

use App\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([            
            'pro_codigo' => 'PRO-10',
            'cat_id' => 10,            
            'pro_nombre' => 'J5',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-9',
            'cat_id' => 9,            
            'pro_nombre' => 'Jeans 40',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',          
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-8',
            'cat_id' => 8,            
            'pro_nombre' => 'Laptop HP i9',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-7',
            'cat_id' => 7,            
            'pro_nombre' => 'Teclado Genius RXW29',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-6',
            'cat_id' => 6,            
            'pro_nombre' => 'Phantom 4 Pro',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',            
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-5',
            'cat_id' => 5,            
            'pro_nombre' => 'Fundamentos de Programación',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',            
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-4',
            'cat_id' => 4,            
            'pro_nombre' => 'Camiseta Blanca 38',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',         
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-3',
            'cat_id' => 3,            
            'pro_nombre' => 'Mouse Gamer Scorpion 128H',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-2',
            'cat_id' => 3,            
            'pro_nombre' => 'Mouse Ergonómico',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
        ]);
        Producto::create([
            'pro_codigo' => 'PRO-1',
            'cat_id' => 1,            
            'pro_nombre' => 'BenQ 24-Inch Gaming Monitor - LED 1080p HD',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',
        ]);
    }
}
