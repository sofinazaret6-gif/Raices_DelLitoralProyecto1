<?php

namespace App\Http\Requests

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'motivo' => 'required',
            'consulta' => 'required|string|min:10|max:500'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Mensajes para  'nombre'
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',

            // Mensajes para  'apellido'
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.max' => 'El apellido no puede tener más de 100 caracteres.',

            // Mensajes para 'email'
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'Por favor, ingresa una dirección de correo válida.',

            // Mensajes para  'consulta'
            'consulta.required' => 'La consulta no puede estar vacía.',
            'consulta.min' => 'La consulta debe tener al menos 10 caracteres.',
            'consulta.max' => 'La consulta no puede superar los 500 caracteres.',
            'motivo.required' => 'Debe seleccionar un motivo para la consulta.',
        ];
    }
}
