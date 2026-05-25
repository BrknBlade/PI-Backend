<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gender'      => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'date'        => ['sometimes', 'date'],
            'hour'        => ['sometimes', 'date_format:H:i'],
            'cut_type_id' => ['sometimes', 'exists:cut_types,id'],
            'status'      => ['sometimes', 'string', 'in:pending,ongoing,cancelled'],
            'employee_id' => ['sometimes', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'gender.string'        => 'El género debe ser un texto válido.',
            'description.string'   => 'La descripción debe ser un texto válido.',
            'date.date'            => 'La fecha no tiene un formato válido.',
            'hour.date_format'     => 'La hora debe tener el formato HH:MM.',
            'cut_type_id.exists'   => 'El tipo de corte seleccionado no existe.',
            'status.in'            => 'El estado debe ser: pending, ongoing o cancelled.',
            'employee_id.exists'   => 'El empleado seleccionado no existe.',
        ];
    }
}
