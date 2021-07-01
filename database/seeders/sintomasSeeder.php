<?php

namespace Database\Seeders;

use App\Models\Sintomas;
use Illuminate\Database\Seeder;

class sintomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sin = new Sintomas();
        $sin->nombre_sintoma = "Fiebre alta";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Dolor de cabeza";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Tos seca";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Dolor muscular";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Perdida de gusto y/o olfato";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Dolor de garganta";
        $sin->save();
        $sin = new Sintomas();
        $sin->nombre_sintoma = "Vomitos/Diarrea";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre_sintoma = "Rinitis/Congestionamiento";
        $sin->save();
    }
}
