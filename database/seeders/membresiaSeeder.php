<?php

namespace Database\Seeders;

use App\Models\Membresias;
use Illuminate\Database\Seeder;

class membresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membresia = new Membresias();
        $membresia->nombre = 'golden';
        $membresia->descuento= 23.5;
        $membresia->save();

        $membresia = new Membresias();
        $membresia->nombre = 'normal';
        $membresia->descuento= 0;
        $membresia->save();
    }
}
