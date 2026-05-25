<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => [ 'required', 'string', 'max:100' ],
            'email' => [ 'required', 'email' ],
            'password' => [ 'required' ],
            'role' => [ 'required', 'numeric', 'between:1,4' ],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe de ser una cadena de texto',
            'name.max' => 'El nombre es demaciado largo, cambialo :)',

            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe de ser similar al siguiente formato: example@email.com',

            'password.required' => 'La contrasena es requerida',

            'role.required' => 'Es necesario saber el rol del usuario',
            'role.numeric' => 'El rol debe de ser uno de los listados'
        ];
    }
}
