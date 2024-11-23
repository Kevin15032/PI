<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorSesion extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:6|max:20',
        ];
    }
}