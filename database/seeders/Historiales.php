<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Historiales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,5);
        foreach ($arrays as $valor) {
        DB::table('historiales')->insert([	            
            'id_bodega_origen' => rand(1,6),
            'id_bodega_destino' => rand(1,6),
            'id_inventario' => rand(1,6),
            'cantidad' => rand(10,100),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        }
    }
}
