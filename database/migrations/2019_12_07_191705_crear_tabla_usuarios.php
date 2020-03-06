<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('Id_Usuario');
            $table->string('Nombre', 50);
            $table->unsignedInteger('Id_Rol');
            $table->foreign('Id_Rol','FK_usuarios_rols')->references('Id_Rol')->on('rols');
            $table->string('Correo_Electronico', 100);
            $table->string('Contrasena', 20);
            $table->date('Fecha_Nacimiento');
            $table->string('Direccion', 100);
            $table->string('Telefono', 100);
            $table->string('Celular', 100);
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
        Schema::dropIfExists('usuarios');
    }
}
