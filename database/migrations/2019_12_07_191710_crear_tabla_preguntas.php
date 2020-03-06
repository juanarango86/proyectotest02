<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('Id_Pregunta');
            $table->unsignedInteger('Id_Formulario');
            $table->foreign('Id_Formulario','FK_pregunta_formulario')->references('Id_Formulario')->on('formularios');
            $table->string('Pregunta', 100);
            $table->unsignedInteger('Id_Tipo_De_Pregunta');
            $table->foreign('Id_Tipo_De_Pregunta','FK_pregunta_tipoPregunta')->references('Id_Tipo_De_Pregunta')->on('tipo_de_preguntas');
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
        Schema::dropIfExists('preguntas');
    }
}
