<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_de_poblacion extends Model
{
	
    protected $fillable = ['nombre_De_Poblacion','edad_Minima','edad_Maxima','estrato_Social'];
}
