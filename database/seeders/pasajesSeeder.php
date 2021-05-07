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
        $pasaje->save();

        $pasaje2 = new Pasajes();
        $pasaje2->id_usuario=2;
        $pasaje2->id_viaje=2;
        $pasaje2->save();

        $pasaje3 = new Pasajes();
        $pasaje3->id_usuario=3;
        $pasaje3->id_viaje=3;
        $pasaje3->save();
    }
}
