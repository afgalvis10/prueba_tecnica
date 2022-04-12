<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Inventarios extends Seeder
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
        DB::table('inventarios')->insert([	            
            'id_bodega' => rand(1,6),
            'id_producto' => rand(1,6),
            'cantidad' => rand(10,100),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        }
    }
}
