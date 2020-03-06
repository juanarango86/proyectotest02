<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['Nombre','Descripcion','Telefono','Celular','Direccion','Correo_Electronico'];
}
