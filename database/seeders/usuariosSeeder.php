<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Seeder;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usu = new Usuarios();
        $usu->nombre = 'tony';
        $usu->apellido = 'pingo';
        $usu->dni = 333331;
        $usu->email = 'tony@gmail.com';
        $usu->contraseña = 'tony123';
        $usu->tarjeta = 12121212;
        $usu->id_membresia = 1;
        $usu->id_permiso = 2;
        $usu->save();

        $usu2 = new Usuarios();
        $usu2->nombre = 'tomas';
        $usu2->apellido = 'mostrasio';
        $usu2->dni = 126789;
        $usu2->email = 'tomas@gmail.com';
        $usu2->contraseña = 'tomas123';
        $usu2->id_permiso = 1; 
        $usu2->save();

        $usu3 = new Usuarios();
        $usu3->nombre = 'brai';
        $usu3->apellido = 'chavez';
        $usu3->dni = 4217845;
        $usu3->email = 'brai@gmail.com';
        $usu3->contraseña = 'brai123';
        $usu3->tarjeta = 11111111;
        $usu3->id_membresia = 1;
        $usu3->id_permiso = 3;
        $usu3->save();

        $usu4 = new Usuarios();
        $usu4->nombre = 'marcelo';
        $usu4->apellido = 'molina';
        $usu4->dni = 4845123;
        $usu4->email = 'marcelo@gmail.com';
        $usu4->contraseña = 'marcelo123';
        $usu4->id_permiso = 2;
        $usu4->save();
    }
}
