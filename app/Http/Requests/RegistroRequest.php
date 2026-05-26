<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            // CAMBIO: Cambiamos 'same:password_confirmation' por 'confirmed'
            'password' => 'required|string|min:8|max:500|confirmed' 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Mensajes para 'nombre'
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',

            // Mensajes para 'email'
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'Por favor, ingresa una dirección de correo válida.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            // Mensajes para 'password'
            'password.required' => 'La contraseña no puede estar vacía.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede superar los 500 caracteres.',
            // CAMBIO: Ahora mapea perfectamente con la regla 'confirmed'
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden.', 
        ];
    }
}