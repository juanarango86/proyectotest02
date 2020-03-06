<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{

    protected $primaryKey ="Id_Proyecto";
    protected $fillable = ['Nombre_Proyecto','Descripcion','Id_Cliente','Cantidad_De_Encuestas','Id_Tipo_De_Poblacion','Estado'];
    
}

