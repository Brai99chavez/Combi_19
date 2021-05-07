<?php

namespace Database\Seeders;

use App\Models\Insumos;
use Illuminate\Database\Seeder;

class insumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insu = new Insumos();
        $insu->nombre = 'cafe con leche';
        $insu->precio = 90.0;
        $insu->descripcion = 'leche descremada con cafe recien molido';
        $insu->disponible = true;
        $insu->save();

        $insu2 = new Insumos();
        $insu2->nombre = 'hamburguesa con papas';
        $insu2->precio = 340.0;
        $insu2->descripcion = 'hamburguesa con lechuga tomate queso y papas con cheddar';
        $insu2->disponible = true;
        $insu2->save();

        $insu3 = new Insumos();
        $insu3->nombre = 'milanesa con pure de mixto';
        $insu3->precio = 230.0;
        $insu3->descripcion = 'milanesa de carne con pure de papa y zapallo';
        $insu3->disponible = false;
        $insu3->save();
    }
}
