<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tipo_de_poblacionFormRequest extends FormRequest
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
            'nombre_De_Poblacion'=>'required',
            'edad_Minima'=>'required',
            'edad_Maxima'=>'required',
            'estrato_Social'=>'required',
            
        ];
    }
}
