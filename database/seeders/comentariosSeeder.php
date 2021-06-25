<?php

namespace Database\Seeders;

use App\Models\Comentarios;
use Illuminate\Database\Seeder;

class comentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comen = new Comentarios();
        $comen->id_usuario = 2;
        $comen->id_viaje = 2;
        $comen->descripcion = "Excelente servicio!! muy conforme";
        $comen->save();

        $comen = new Comentarios();
        $comen->id_usuario = 2;
        $comen->id_viaje = 2;
        $comen->descripcion = "Me gustaria que puedan incorporar servicio de mozos en los viajes";
        $comen->save();

    }
}
