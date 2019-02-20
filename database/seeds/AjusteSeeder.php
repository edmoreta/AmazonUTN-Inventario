<?php

use Illuminate\Database\Seeder;
use App\Documento;
use Carbon\Carbon;

class AjusteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::create([
            'doc_codigo' => 'AJ-2',
            'doc_tipo' => "AJ",
            'doc_fecha' => "2019-02-11",
            'doc_created_at' => Carbon::now(),
            'doc_updated_at' => Carbon::now(),
        ]);
    }
}