<?php

namespace App\Http\Requests;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCutTypeRequest extends FormRequest
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
            'name' => ['string', 'required', 'max:100'],
            'description' => ['string', 'nullable'],
            'duration' => ['integer', 'nullable'],
            'price' => ['numeric', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El nombre del corte debe de ser una cadena de texto',
            'name.required' => 'Es obligatorio asignar un nombre',
            'name.max' => 'El nombre del corte es demaciado largo',
            'duration.integer' => 'La duración debe ser un número entero en minutos',
            'price.numeric' => 'El precio debe ser un número',
        ];
    }
}
