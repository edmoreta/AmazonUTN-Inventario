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
            'cat_codigo' => 'CAT-10',
            'cat_codigop' => null,
            'cat_nombre' => 'Smartphones',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-9',
            'cat_codigop' => null,
            'cat_nombre' => 'Ropa',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-8',
            'cat_codigop' => null,
            'cat_nombre' => 'Laptops',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-7',
            'cat_codigop' => null,
            'cat_nombre' => 'Teclados',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-6',
            'cat_codigop' => null,
            'cat_nombre' => 'Drones',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-5',
            'cat_codigop' => null,
            'cat_nombre' => 'Libros',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-4',
            'cat_codigop' => null,
            'cat_nombre' => 'Camisetas',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-3',
            'cat_codigop' => null,
            'cat_nombre' => 'Mouse',            
        ]);
        Categoria::create([            
            'cat_codigo' => 'CAT-2',
            'cat_codigop' => null,
            'cat_nombre' => 'Computadoras',            
        ]);
        Categoria::create([
            'cat_codigo' => 'CAT-1',
            'cat_codigop' => null,
            'cat_nombre' => 'Pantallas',
        ]);
        
    }
}
