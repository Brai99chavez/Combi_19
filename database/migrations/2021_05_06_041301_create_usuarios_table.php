<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->integer('dni');
            $table->string('email')->unique();
            $table->string('contraseña');
            $table->integer('tarjeta')->nullable();
            $table->integer('disponible')->nullable();
            $table->integer('id_membresia')->default(2);
            $table->integer('id_permiso')->default(1);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
