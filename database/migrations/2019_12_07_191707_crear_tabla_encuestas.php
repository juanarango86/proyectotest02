<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEncuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('Id_Encuesta');
            $table->string('Nombre', 50);
            $table->unsignedInteger('Id_Proyecto');
            $table->foreign('Id_Proyecto','FK_encuetas_proyectos')->references('Id_Proyecto')->on('proyectos');
            $table->boolean('Estado');
            $table->unsignedInteger('Id_Formulario');
            $table->foreign('Id_Formulario','FK_encuetas_formulario')->references('Id_Formulario')->on('formularios');   
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
        Schema::dropIfExists('encuestas');
    }
}
