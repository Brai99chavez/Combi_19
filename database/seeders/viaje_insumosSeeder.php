<?php

namespace Database\Seeders;

use App\Models\Viaje_insumos;
use Illuminate\Database\Seeder;

class viaje_insumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vi = new Viaje_insumos();
        $vi->id_viaje = 1;
        $vi->id_insumo = 1;
        $vi->save();

        $vi2 = new Viaje_insumos();
        $vi2->id_viaje = 1;
        $vi2->id_insumo = 2;
        $vi2->save();
    }
}
