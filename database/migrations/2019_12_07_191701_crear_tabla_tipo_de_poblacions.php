<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTipoDePoblacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_de_poblacions', function (Blueprint $table) {
            $table->increments('Id_Tipo_De_Poblacion');
            $table->string('Nombre_De_Poblacion', 100);
            $table->integer('Edad_Minima');
            $table->integer('Edad_Maxima');
            $table->integer('Estrato_Social');
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
        Schema::dropIfExists('tipo_de_poblacions');
    }
}
