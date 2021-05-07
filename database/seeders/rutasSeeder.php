<?php

namespace Database\Seeders;

use App\Models\Rutas;
use Illuminate\Database\Seeder;

class rutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruta1 = new Rutas();
        $ruta1->id_ciudadOrigen = '1';
        $ruta1->id_ciudadDestino = '2';
        $ruta1->save();
    
        $ruta2 = new Rutas();
        $ruta2->id_ciudadOrigen = '3';
        $ruta2->id_ciudadDestino = '4';
        $ruta2->save();

        $ruta3 = new Rutas();
        $ruta3->id_ciudadOrigen = '5';
        $ruta3->id_ciudadDestino = '6';
        $ruta3->save();        
    }
}
