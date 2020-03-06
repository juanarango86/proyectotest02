<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre_Proyecto'=>'required',
            'descripcion'=>'required',
            'id_Cliente'=>'required',
            'cantidad_De_Encuestas'=>'required',
            'id_Tipo_De_Poblacion'=>'required',
            'estado'=>'required',
            
        ];
    }
}
