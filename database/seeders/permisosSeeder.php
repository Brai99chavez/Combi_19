<?php

namespace Database\Seeders;

use App\Models\Permisos;
use Illuminate\Database\Seeder;

class permisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm = new Permisos();
        $perm->nombre = 'usuario';
        $perm->save();

        $perm2 = new Permisos();
        $perm2->nombre = 'chofer';
        $perm2->save();

        $perm3 = new Permisos();
        $perm3->nombre = 'admin';
        $perm3->save();
    }
}
