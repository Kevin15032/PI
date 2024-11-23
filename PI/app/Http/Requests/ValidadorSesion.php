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
            'email' => 'required|email|min:5|max:255',
            'password' => 'required|min:6|max:20',
        ];
    }
}