<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorVenta extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'busqueda' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'busqueda.required' => 'El campo de búsqueda es obligatorio.',
            'busqueda.string' => 'El campo de búsqueda debe ser una cadena de texto.',
            'busqueda.max' => 'El campo de búsqueda no debe exceder los 255 caracteres.'
        ];
    }
}
