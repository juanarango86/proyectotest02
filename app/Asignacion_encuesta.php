<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_encuesta extends Model
{
    protected $primaryKey ="Id_Asignacion_Encuesta";
    protected $fillable = ['Id_Encuesta','Id_Usuario'];
}
