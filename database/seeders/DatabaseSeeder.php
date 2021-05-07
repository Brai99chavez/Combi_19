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
        $this->call(casosSeeder::class);
        $this->call(membresiaSeeder::class);
        $this->call(permisosSeeder::class);
        $this->call(viaje_insumosSeeder::class);
        $this->call(pasajesSeeder::class);
        $this->call(combisSeeder::class);
        
    }
}
