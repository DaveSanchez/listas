<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lista_id')->unsigned();
            $table->integer('temporal_id')->unsigned();
            $table->boolean('entrada')->default(0);
            $table->time('hr_entrada')->nullable();
            $table->boolean('salida')->default(0);
            $table->time('hr_salida')->nullable();
            $table->foreign('lista_id')->references('id')->on('listas');
            $table->foreign('temporal_id')->references('id')->on('temporales');
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
        Schema::dropIfExists('asistencias');
    }
}
