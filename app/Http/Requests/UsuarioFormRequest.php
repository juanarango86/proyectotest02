<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'nombre'=>'required',
            'id_Rol'=>'required',
            'correo_Electronico'=>'required',
            'contrasena'=>'required',
            'fecha_Nacimiento'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'celular'=>'required',
            
        ];
    }
}
