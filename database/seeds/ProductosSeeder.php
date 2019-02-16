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
            'pro_created_at' => '2019-02-11 00:01:00',
            'pro_updated_at' => '2019-02-11 00:01:00',
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-9',
            'cat_id' => 9,            
            'pro_nombre' => 'Zapato Nike Mens',
            'pro_descripcion' => 'Flyknit Trainer, Black/Anthracite, 7.5 M US',
            'pro_caracteristicas' => 'Package Dimensions: 13.1 x 8.1 x 4.5 inches\n    Shipping Weight: 1.46 pounds\n    ASIN: B079QHSLRW\n    Item model number: AH8396-004\n    Date first listed on Amazon: October 31, 2018',
            'pro_costo' => '10',
            'pro_precio' => '12',     
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-8',
            'cat_id' => 8,            
            'pro_nombre' => 'Acer Aspire E 15',
            'pro_descripcion' => '15.6\" Full HD, 8th Gen Intel Core i3-8130U, 6GB RAM Memory, 1TB HDD, 8X DVD, E5-576-392H',
            'pro_caracteristicas' => '8th Generation Intel Core i3-8130U Processor (Up to 3.4GHz)\n15.6\" Full HD (1920 x 1080) widescreen LED-lit Display\n6GB Dual Channel Memory, 1TB HDD & 8X DVD\nUp to 13.5-hours of battery life\nWindows 10 Home',
            'pro_costo' => '10',
            'pro_precio' => '12',   
            'pro_foto' => 'https://images-na.ssl-images-amazon.com/images/I/61Yeir0uhIL._SX679_.jpg',
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',             
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-7',
            'cat_id' => 7,            
            'pro_nombre' => 'Teclado Genius RXW29',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-6',
            'cat_id' => 6,            
            'pro_nombre' => 'Phantom 4 Pro',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',            
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-5',
            'cat_id' => 5,            
            'pro_nombre' => 'Fundamentos de Programación',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',            
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-4',
            'cat_id' => 4,            
            'pro_nombre' => 'Camiseta Blanca 38',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',         
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-3',
            'cat_id' => 3,            
            'pro_nombre' => 'Mouse Gamer Scorpion 128H',
            'pro_descripcion' => 'descripcion',
            'pro_caracteristicas' => 'caracteristicas',
            'pro_costo' => '10',
            'pro_precio' => '12',           
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([            
            'pro_codigo' => 'PRO-2',
            'cat_id' => 3,            
            'pro_nombre' => 'Razer DeathAdder Elite',
            'pro_descripcion' => 'True 16,000 5G Optical Sensor - Razer Mechanical Mouse Switches (Up to 50 Million Clicks) - Ergonomic Form Factor - Esports Gaming Mouse',
            'pro_caracteristicas' => 'INCREDIBLY ACCURATE: True 16,000 DPI 5G Optical Sensor. Up to 450 inches per second (IPS) with 99.4% resolution accuracy\nERGONOMIC FORM FACTOR: Perfectly designed to fit for a more comfortable gaming experience\nRAZER MECHANICAL SWITCH: Durable up to 50 million clicks\nPOWERED BY RAZER CHROMA: 16.8 million customizable color option. Customize the scroll wheel and Razer logo\nCompatible with Xbox One for basic input',
            'pro_costo' => '30',
            'pro_precio' => '49',
            'pro_foto' => 'https://images-na.ssl-images-amazon.com/images/I/61YGCj4kgOL._SY679_.jpg',
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',     
        ]);
        Producto::create([
            'pro_codigo' => 'PRO-1',
            'cat_id' => 1,            
            'pro_nombre' => 'BenQ 24-Inch Gaming Monitor - LED 1080p HD',
            'pro_descripcion' => 'BenQ 24-Inch Gaming Monitor - LED 1080p HD Monitor - 1ms Response Time for Ultra Fast Console Gaming (RL2455HM)',
            'pro_caracteristicas' => ' 1ms MONITOR: Fast Response Time for ultra smooth console gaming experience
                                        FULL HD MONITOR: 1080p monitor with RTS mode developed by professional gamers
                                        CONSOLE GAMING MONITOR: Black eQualizer provides visual clarity in dark scenes, Display Mode and Smart Scaling for quick screen size adjustment
                                        PROFFESIONAL GAMING ACCESSORIES: Flicker Free technology for reduced eye strain
                                        PRO GAMING DISPLAY with built-in speakers and a variety of input connectors, including D-sub, DVI-DL (Dual Link), HDMI x2, Headphone Jack, Line in ',
            'pro_costo' => '180',
            'pro_precio' => '230',
            'pro_foto' => 'https://images-na.ssl-images-amazon.com/images/I/81wuTcXD65L._SL1500_.jpg',
            'pro_created_at' => '2019-02-11 00:00:00',
            'pro_updated_at' => '2019-02-11 00:00:00',
        ]);
    }
}
