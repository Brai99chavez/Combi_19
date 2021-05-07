<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = new Categorias();
        $categorias->nombre = 'COMODA';
        $categorias->save();

        $categorias2 = new Categorias();
        $categorias2->nombre = 'SUPERCOMODA';
        $categorias2->save();

    }
}
