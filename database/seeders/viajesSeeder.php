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
    $viaje1->save();

    }
}
