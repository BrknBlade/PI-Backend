<?php

namespace App\Http\Requests;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBusinessInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role === Roles::ADMIN
            || $this->user()->role === Roles::OWNER;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => [ 'sometimes', 'string', 'max:100' ],
            'phone_number' => [ 'sometimes', 'string', 'max:100' ],
            'email' => [ 'sometimes', 'string', 'max:100' ],
            'address' => [ 'sometimes', 'string', 'max:100' ],
            'week_open_at' => [ 'sometimes', Rule::date()->format("H:i:s") ],
            'week_close_at' => [ 'sometimes', Rule::date()->format("H:i:s") ],
            'weekend_open_at' => [ 'sometimes', Rule::date()->format("H:i:s") ],
            'weekend_close_at' => [ 'sometimes', Rule::date()->format("H:i:s") ],
            'sunday_work' => [ 'sometimes', 'boolean' ],
            'email_reminder' => [ 'sometimes', 'boolean' ],
            'sms_reminder' => [ 'sometimes', 'boolean' ],
            'employee_reminder' => [ 'sometimes', 'boolean' ],
            'daily_summary' => [ 'sometimes', 'boolean' ],
            'maximum_booking_days' => [ 'sometimes', 'numeric' ],
            'minimum_booking_days' => [ 'sometimes', 'numeric' ],
            'limit_cancell_hours' => [ 'sometimes', 'numeric', 'min:24' ],
        ];
    }

    public function messages()
    {
        return [
            'company_name.string' => 'El nombre de la empresa debe ser un texto válido.',
            'company_name.max' => 'El nombre de la empresa no puede superar los 100 caracteres.',

            'phone_number.string' => 'El número de teléfono debe ser un texto válido.',
            'phone_number.max' => 'El número de teléfono no puede superar los 100 caracteres.',

            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.max' => 'El correo electrónico no puede superar los 100 caracteres.',

            'address.string' => 'La dirección debe ser un texto válido.',
            'address.max' => 'La dirección no puede superar los 100 caracteres.',

            'week_open_at.date' => 'La hora de apertura entre semana debe ser una fecha válida.',
            'week_open_at.date_format' => 'La hora de apertura entre semana debe tener el formato H:i:s.',

            'week_close_at.date' => 'La hora de cierre entre semana debe ser una fecha válida.',
            'week_close_at.date_format' => 'La hora de cierre entre semana debe tener el formato H:i:s.',

            'weekend_open_at.date' => 'La hora de apertura en fin de semana debe ser una fecha válida.',
            'weekend_open_at.date_format' => 'La hora de apertura en fin de semana debe tener el formato H:i:s.',

            'weekend_close_at.date' => 'La hora de cierre en fin de semana debe ser una fecha válida.',
            'weekend_close_at.date_format' => 'La hora de cierre en fin de semana debe tener el formato H:i:s.',

            'sunday_work.boolean' => 'El valor de trabajo en domingo debe ser verdadero o falso.',
            'email_reminder.boolean' => 'El recordatorio por correo debe ser verdadero o falso.',
            'sms_reminder.boolean' => 'El recordatorio por SMS debe ser verdadero o falso.',
            'employee_reminder.boolean' => 'El recordatorio para empleados debe ser verdadero o falso.',
            'daily_reminder.boolean' => 'El recordatorio diario debe ser verdadero o falso.',

            'maximum_booking_days.numeric' => 'El máximo de días de reserva debe ser un número.',
            'minimum_booking_days.numeric' => 'El mínimo de días de reserva debe ser un número.',

            'limit_cancell_hours.numeric' => 'El límite de horas para cancelar debe ser un número.',
            'limit_cancell_hours.min' => 'El límite de horas para cancelar debe ser al menos 24.',
        ];
    }
}
