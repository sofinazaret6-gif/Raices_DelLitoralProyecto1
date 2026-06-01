<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarPasswordRequest
    extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password_actual' =>
                'required',

            'password' =>
                'required|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'password_actual.required' =>
                'Debes ingresar tu contraseña actual.',

            'password.required' =>
                'La nueva contraseña es obligatoria.',

            'password.min' =>
                'La contraseña debe tener al menos 8 caracteres.',

            'password.confirmed' =>
                'Las contraseñas no coinciden.'
        ];
    }
}