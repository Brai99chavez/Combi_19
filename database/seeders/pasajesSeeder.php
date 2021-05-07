<?php

namespace Database\Seeders;

use App\Models\Pasajes;
use Illuminate\Database\Seeder;

class pasajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pasaje = new Pasajes();
        $pasaje->id_usuario=1;
        $pasaje->id_viaje=1;

        $pasaje = new Pasajes();
        $pasaje->id_usuario=2;
        $pasaje->id_viaje=2;

        $pasaje = new Pasajes();
        $pasaje->id_usuario=3;
        $pasaje->id_viaje=3;
    }
}
