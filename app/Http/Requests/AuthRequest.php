<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => ['string','email','required'],
            'password' => ['string','required']
        ];
    }

    public function messages() {
        return [
            'email.string' => 'el campo email debe de ser un string',
            'email.email' => 'el email debe de seguir al estructura email, Ej. example@email.com',
            'email.required' => 'el campo email es obligatorio',

            'password.string' => 'La contrasena debe de ser de tipo texto',
            'password.required' => 'La contrasena es obligatoria'
        ];
    }
}
