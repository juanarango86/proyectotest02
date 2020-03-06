<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flujo extends Model
{
    protected $primaryKey ="Id_Flujo";
    protected $fillable = ['Orden','Salto','Validacion','Id_Pregunta'];
}
