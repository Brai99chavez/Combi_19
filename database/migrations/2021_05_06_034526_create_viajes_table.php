<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id_viaje');
            $table->integer('id_chofer');
            $table->integer('id_combi');
            $table->string('id_ciudadOrigen');
            $table->string('id_ciudadDestino');
            $table->double('precio');
            $table->dateTime('fechaYhora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
