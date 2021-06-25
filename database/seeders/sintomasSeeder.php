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
        $sin->nombre = "Fiebre alta";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Dolor de cabeza";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Tos seca";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Dolor muscular";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Perdida de gusto y/o olfato";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Dolor de garganta";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Vomitos/Diarrea";
        $sin->save();

        $sin = new Sintomas();
        $sin->nombre = "Rinitis/Congestionamiento";
        $sin->save();
    }
}
