<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey ="Id_Usuario";
    protected $fillable = ['Nombre','Id_Rol','Correo_Electronico','Contrasena','Fecha_Nacimiento','Direccion','Telefono','Celular'];
}
