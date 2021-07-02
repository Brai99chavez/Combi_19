<?php

namespace Database\Seeders;

use App\Models\Viajes;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class viajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $viaje1 = new Viajes();
    $viaje1->id_chofer = 1;
    $viaje1->id_combi = 1;
    $viaje1->id_ruta = 1;
    $viaje1->precio = 10000;
    $viaje1->fecha = Carbon::createFromFormat('d/m/Y', '9/7/2021');
    $viaje1->hora = Carbon::createFromTime('15','30','00');
    $viaje1->cantPasajes = 10;
    $viaje1->estado = "Pendiente";
    $viaje1->save();

    $viaje1 = new Viajes();
    $viaje1->id_chofer = 1;
    $viaje1->id_combi = 1;
    $viaje1->id_ruta = 3;
    $viaje1->precio = 10000;
    $viaje1->fecha = Carbon::createFromFormat('d/m/Y', '1/7/2021');
    $viaje1->hora = Carbon::createFromTime('20','30','00');
    $viaje1->cantPasajes = 12;
    $viaje1->estado = "Pendiente";
    $viaje1->save();

    $viaje2 = new Viajes();
    $viaje2->id_chofer = 1;
    $viaje2->id_combi = 2;
    $viaje2->id_ruta = 2;
    $viaje2->precio = 8000;
    $viaje2->fecha = Carbon::createFromFormat('d/m/Y', '5/6/2021');
    $viaje2->hora = Carbon::createFromTime('19','30','00');
    $viaje2->cantPasajes = 31;
    $viaje2->estado = "Finalizado";
    $viaje2->save();

    $viaje3 = new Viajes();
    $viaje3->id_chofer = 4;
    $viaje3->id_combi = 3;
    $viaje3->id_ruta =1;
    $viaje3->precio = 15000;
    $viaje3->fecha = Carbon::createFromFormat('d/m/Y', '9/7/2021');
    $viaje3->hora = Carbon::createFromTime('21','30','00');
    $viaje3->cantPasajes = 23;
    $viaje3->estado = "Pendiente";
    $viaje3->save();

    }
}
