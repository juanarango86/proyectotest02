<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $primaryKey ="Id_Encuesta";
    protected $fillable = ['Nombre','Id_Proyecto','Estado','Id_Formulario'];
}
