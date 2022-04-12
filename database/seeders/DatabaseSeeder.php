<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Usuarios::class);
        $this->call(Productos::class);
        $this->call(Bodegas::class);
        $this->call(Inventarios::class);
        $this->call(Historiales::class);
    }
}
