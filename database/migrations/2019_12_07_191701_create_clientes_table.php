<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    /* public $tableName = 'clientes'; */

    /**
     * Run the migrations.
     * @table clientes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id_Cliente');
            $table->string('Nombre', 100);
            $table->string('Descripcion',100);
            $table->string('Telefono', 100);
            $table->string('Celular', 100);
            $table->string('Direccion', 100);
            $table->string('Correo_Electronico', 100);
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
       Schema::dropIfExists($this->tableName);
     }
}
