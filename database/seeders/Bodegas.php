<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Bodegas extends Seeder
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
        DB::table('bodegas')->insert([	            
            'nombre' => Str::random(10),
            'id_responsable' => rand(1,6),
            'estado' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        }
    }
}
