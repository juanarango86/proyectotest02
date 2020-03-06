<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFlujos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flujos', function (Blueprint $table) {
            $table->increments('Id_Flujo');
            $table->integer('Orden');
            $table->integer('Salto');
            $table->string('Validacion', 50);
            $table->unsignedInteger('Id_Pregunta');
            $table->foreign('Id_Pregunta','FK_flujo_pregunta')->references('Id_Pregunta')->on('preguntas');
			$table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flujos');
    }
}
