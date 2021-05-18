<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combis', function (Blueprint $table) {
            $table->bigIncrements('id_combi');
            $table->string('patente')->unique();
            $table->string('modelo',50);
            $table->text('color',15);
            $table->integer('cant_asientos');
            $table->integer('id_categoria');
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
        Schema::dropIfExists('combis');
    }
}
