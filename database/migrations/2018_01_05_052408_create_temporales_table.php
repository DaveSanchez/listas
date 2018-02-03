<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_s');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nac');
            $table->text('direccion');
            $table->string('tel_personal');
            $table->string('tel_casa');
            $table->string('email');
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
        Schema::dropIfExists('temporales');
    }
}
