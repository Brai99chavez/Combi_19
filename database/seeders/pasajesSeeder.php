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
        $pasaje->id_usuario=2;
        $pasaje->id_viaje=1;
        $pasaje->estado = "Pendiente";
        $pasaje->reembolsar = "NO";
        $pasaje->precio=8000;
        $pasaje->save();

        $pasaje2 = new Pasajes();
        $pasaje2->id_usuario=2;
        $pasaje2->id_viaje=2;
        $pasaje2->precio=8000;
        $pasaje2->estado = "Confirmado";
        $pasaje2->reembolsar = "NO";
        $pasaje2->save();
        
        $pasaje2 = new Pasajes();
        $pasaje2->id_usuario=5;
        $pasaje2->id_viaje=1;
        $pasaje2->estado = "Pendiente";
        $pasaje2->reembolsar = "NO";
        $pasaje2->precio=10000;
        $pasaje2->save();

        $pasaje3 = new Pasajes();
        $pasaje3->id_usuario=6;
        $pasaje3->id_viaje=3;
        $pasaje3->precio=15000;
        $pasaje3->estado = "Pendiente";
        $pasaje3->reembolsar = "NO";
        $pasaje3->save();
    }
}
