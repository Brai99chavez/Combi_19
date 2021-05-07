<?php

namespace Database\Seeders;

use App\Models\Tarjetas;
use Illuminate\Database\Seeder;

class tarjetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarjeta1 = new Tarjetas();
        $tarjeta1->numero_tarjeta = 123456789;
        $tarjeta1->cod_seguridad = 563;
        $tarjeta1->vencimiento = '7/21';
        $tarjeta1->id_usuario = 1;
        $tarjeta1->save();

        $tarjeta2 = new Tarjetas();
        $tarjeta2->numero_tarjeta = 987654321;
        $tarjeta2->cod_seguridad = 365;
        $tarjeta2->vencimiento = '8/21';
        $tarjeta2->id_usuario = 2;
        $tarjeta2->save();

        $tarjeta3 = new Tarjetas();
        $tarjeta3->numero_tarjeta = 156550300;
        $tarjeta3->cod_seguridad = 789;
        $tarjeta3->vencimiento = '9/21';
        $tarjeta3->id_usuario = 3;
        $tarjeta3->save();
    }
}
