<?php

namespace Database\Seeders;

use App\Models\Ciudades;
use Illuminate\Database\Seeder;

class ciudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ciu = new Ciudades();
        $ciu->nombre = 'buenos aires';
        $ciu->direccion=' 524 numero 2572';
        $ciu->disponible = true;
        $ciu->save();

        $ciu2 = new Ciudades();
        $ciu2->nombre = 'rio negro';
        $ciu2->direccion=' calle Laprida numero de casa 2332';
        $ciu2->disponible = true;
        $ciu2->save();

        $ciu3 = new Ciudades();
        $ciu3->nombre = 'la pampa';
        $ciu3->direccion=' calle albina numero de casa257';
        $ciu3->disponible = true;
        $ciu3->save();

        $ciu4 = new Ciudades();
        $ciu4->nombre = 'jujuy';
        $ciu4->direccion=' calle malen numero de casa 572';
        $ciu4->disponible = true;
        $ciu4->save();

        $ciu5 = new Ciudades();
        $ciu5->nombre = 'entre rios';
        $ciu5->direccion=' calle acevedo numero de casa 773';
        $ciu5->disponible = true;
        $ciu5->save();

        $ciu6 = new Ciudades();
        $ciu6->nombre = 'salta';
        $ciu6->direccion=' calle asd numero de casa 1111';
        $ciu6->disponible = true;
        $ciu6->save();

    }
}
