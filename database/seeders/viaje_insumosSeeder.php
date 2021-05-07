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

        $vi3 = new Viaje_insumos();
        $vi3->id_viaje = 1;
        $vi3->id_insumo = 3;
        $vi3->save();

        $vi4 = new Viaje_insumos();
        $vi4->id_viaje = 2;
        $vi4->id_insumo = 1;
        $vi4->save();

        $vi5 = new Viaje_insumos();
        $vi5->id_viaje = 2;
        $vi5->id_insumo = 2;
        $vi5->save();

        $vi6 = new Viaje_insumos();
        $vi6->id_viaje = 3;
        $vi6->id_insumo = 1;
        $vi6->save();

        $vi7 = new Viaje_insumos();
        $vi7->id_viaje = 4;
        $vi7->id_insumo = 2;
        $vi7->save();
    }
}
