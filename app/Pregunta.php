<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $fillable = ['Id_Formulario','Pregunta','Id_Tipo_De_Pregunta'];
}
