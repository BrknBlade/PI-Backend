<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['string','max:100'],
            'email' => ['string','email'],
            'password' => ['string'],
            'role' => ['number','between:1,4'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El nombre debe de ser una cadena de texto',
            'name.max' => 'El nombre es demaciado largo, cambialo :)',

            'email.string' => 'El email debe de ser una cadena de texto',
            'email.email' => 'El email debe de ser similar al siguiente formato: example@email.com',

            'password.string' => 'La contrasena debe de ser una cadena de texto',

            'role' => 'El rol debe de ser uno de los listados'
        ];
    }
}
