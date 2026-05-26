<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => [ 'required', 'string', 'max:200' ],
            'email' => [ 'required', 'email' ],
            'password' => [ 'required' ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe de ser una cadena de texto',
            'name.max' => 'El nombre supera la longitud permitida',

            'email.required' => 'El correo electronico es requerido',
            'email.email' => 'El email debe de seguir el siguiente formato: example@email.com',

            'password.required' => 'La contraseña es obligatoria bro'
        ];
    }
}
