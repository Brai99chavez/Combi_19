<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistrosCovidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_covid', function (Blueprint $table) {
            
            $table->bigIncrements('id_registro');
            $table->integer('id_usuario');
            $table->integer('id_viaje');
            $table->integer('id_sintoma');
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
        Schema::dropIfExists('registros_covid');
    }
}
