<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Productos extends Seeder
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
        DB::table('productos')->insert([	            
            'nombre' => Str::random(10),
            'descripcion' => Str::random(10),
            'estado' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        }
    }
}
