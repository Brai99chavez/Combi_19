<?php

namespace Database\Seeders;

use App\Models\Combis;
use Illuminate\Database\Seeder;

class combisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combi = new Combis();
        $combi-> patente = '123-asd';
        $combi-> modelo = 'nissan';
        $combi-> color = 'rojo';
        $combi-> cant_asientos = '12';
        $combi-> id_categoria = 1;
        $combi-> disponible = true;
        $combi->save();

        $combi2 = new Combis();
        $combi2-> patente = '456-asd';
        $combi2-> modelo = 'mercedes';
        $combi2-> color = 'azul';
        $combi2-> cant_asientos = '32';
        $combi2-> id_categoria = 2;
        $combi2-> disponible = true;
        $combi2->save();

        $combi3 = new Combis();
        $combi3-> patente = '789-asd';
        $combi3-> modelo = 'ford';
        $combi3-> color = 'blanco';
        $combi3-> cant_asientos = '24';
        $combi3-> id_categoria = 1;
        $combi3-> disponible = true;
        $combi3->save();

        $combi4 = new Combis();
        $combi4-> patente = '012-asd';
        $combi4-> modelo = 'honda';
        $combi4-> color = 'negro';
        $combi4-> cant_asientos = '26';
        $combi4-> id_categoria = 2;
        $combi4-> disponible = true;
        $combi4->save();


    }
}
