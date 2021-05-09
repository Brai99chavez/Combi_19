<?php

namespace Database\Seeders;

use App\Models\Casos;
use Illuminate\Database\Seeder;

class casosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casos = new Casos();
        $casos->id_usuario = 1;
        $casos->id_viaje = 5;
        $casos->descripcion= 'caso con fiebre';
        $casos->save();

        Casos::factory(50)->create();
    }
}
