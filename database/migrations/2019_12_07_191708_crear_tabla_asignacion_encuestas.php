<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsignacionEncuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_encuestas', function (Blueprint $table) {
            $table->increments('Id_Asignacion_Encuesta');
            $table->unsignedInteger('Id_Encuesta');
            $table->foreign('Id_Encuesta','FK_usuEncueta_encuestas')->references('Id_Encuesta')->on('encuestas');
            $table->unsignedInteger('Id_Usuario');
            $table->foreign('Id_Usuario','FK_usuEncueta_usuarios')->references('Id_Usuario')->on('usuarios');
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
        Schema::dropIfExists('asignacion_encuestas');
    }
}
