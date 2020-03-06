<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_preg extends Model
{
    protected $primaryKey ="Id_form_preg";
    //
    protected $fillable = ['Id_Pregunta','Id_Formulario','Id_Respuesta'];
}
