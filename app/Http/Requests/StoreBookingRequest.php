<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gender'      => ['required', 'string'],
            'description' => ['required', 'string'],
            'date'        => ['required', 'date'],
            'hour'        => ['required', 'date_format:H:i'],
            'cut_type_id' => ['required', 'exists:cut_types,id'],
            'employee_id' => ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'gender.required'      => 'El género es obligatorio.',
            'gender.string'        => 'El género debe ser un texto válido.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string'   => 'La descripción debe ser un texto válido.',
            'date.required'        => 'La fecha es obligatoria.',
            'date.date'            => 'La fecha no tiene un formato válido.',
            'hour.required'        => 'La hora es obligatoria.',
            'hour.date_format'     => 'La hora debe tener el formato HH:MM.',
            'cut_type_id.required' => 'El tipo de corte es obligatorio.',
            'cut_type_id.exists'   => 'El tipo de corte seleccionado no existe.',
            'employee_id.exists'   => 'El empleado seleccionado no existe.',
        ];
    }
}
