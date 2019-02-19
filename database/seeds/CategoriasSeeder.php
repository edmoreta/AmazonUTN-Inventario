<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Categoria::class, 10)->create();        
        Categoria::create([
            'cat_codigo' => 'CAT-1',
            'cat_codigop' => null,
            'cat_nombre' => 'Pantallas',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);        
        Categoria::create([            
            'cat_codigo' => 'CAT-2',
            'cat_codigop' => null,
            'cat_nombre' => 'Computadoras',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-3',
            'cat_codigop' => null,
            'cat_nombre' => 'Mouse',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-4',
            'cat_codigop' => null,
            'cat_nombre' => 'Camisetas',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-5',
            'cat_codigop' => null,
            'cat_nombre' => 'Libros',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-6',
            'cat_codigop' => null,
            'cat_nombre' => 'Drones',
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-7',
            'cat_codigop' => null,
            'cat_nombre' => 'Teclados',     
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',       
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-8',
            'cat_codigop' => null,
            'cat_nombre' => 'Laptops',            
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-9',
            'cat_codigop' => null,
            'cat_nombre' => 'Zapatos',        
            'cat_created_at' => '2019-02-10 00:00:00',
            'cat_updated_at' => '2019-02-10 00:00:00',    
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-10',
            'cat_codigop' => null,
            'cat_nombre' => 'Smartphones',         
            'cat_created_at' => '2019-02-10 00:01:00',
            'cat_updated_at' => '2019-02-10 00:01:00',   
        ]);
    }
}
