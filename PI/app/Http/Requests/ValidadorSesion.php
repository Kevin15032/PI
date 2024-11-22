<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorSesion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    
        if ($this->route()->getName() === 'register.submit') {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|string|min:4|max:20|unique:users,username',
                'password' => 'required|string|min:6|max:20|confirmed',
                'role' => 'required|in:administrador,usuario',
            ];
        } elseif ($this->route()->getName() === 'login.submit') {
            
            return [
                'username' => 'required|min:4|max:20',
                'password' => 'required|min:6|max:20',
            ];
        }
        return [];
    }
}