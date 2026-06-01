<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerfilRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' =>
                'required|string|max:100',

            'apellido' =>
                'required|string|max:100',

            'telefono' =>
                'nullable|string|max:20',

            'email' => [
                'required',
                'email',

                Rule::unique(
                    'personas',
                    'email'
                )->ignore(
                    session('id_usuario')
                )
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' =>
                'El nombre es obligatorio.',

            'apellido.required' =>
                'El apellido es obligatorio.',

            'telefono.max' =>
                'El teléfono no puede superar los 20 caracteres.',

            'email.required' =>
                'El correo electrónico es obligatorio.',

            'email.email' =>
                'Ingresá un correo válido.',

            'email.unique' =>
                'Este correo ya está registrado.'
        ];
    }
}
