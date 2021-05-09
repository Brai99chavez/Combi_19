<?php

namespace Database\Seeders;

use App\Models\Viajes;
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
    $viaje1->save();

    $viaje2 = new Viajes();
    $viaje2->id_chofer = 1;
    $viaje2->id_combi = 2;
    $viaje2->id_ruta = 2;
    $viaje2->precio = 11000;
    $viaje2->save(); 

    $viaje3 = new Viajes();
    $viaje3->id_chofer = 1;
    $viaje3->id_combi = 3;
    $viaje3->id_ruta = 3;
    $viaje3->precio = 12000;
    $viaje3->save(); 

    $viaje3 = new Viajes();
    $viaje3->id_chofer = 4;
    $viaje3->id_combi = 4;
    $viaje3->id_ruta = 2;
    $viaje3->precio = 11000;
    $viaje3->save(); 
    }
}
