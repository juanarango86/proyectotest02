<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFormPregs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pregs', function (Blueprint $table) {
            $table->increments('Id_form_preg');
            $table->unsignedInteger('Id_Pregunta');
            $table->foreign('Id_Pregunta','FK_formPreg_pregunta')->references('Id_Pregunta')->on('preguntas');
            $table->unsignedInteger('Id_Formulario');
            $table->foreign('Id_Formulario','FK_formPreg_formulario')->references('Id_Formulario')->on('formularios');
            $table->unsignedInteger('Id_Respuesta');
            $table->foreign('Id_Respuesta','FK_formPreg_Respuesta')->references('Id_Respuesta')->on('respuestas');
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
        Schema::dropIfExists('form_pregs');
    }
}
