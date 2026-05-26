<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
            'nombre'    => 'required|string|max:100',
            'apellido'  => 'required|string|max:100',
            'telefono'  => 'nullable|string|max:20', // nullable por que es opcional
            'email'     => 'required|email|unique:personas,email',
            'password'  => 'required|string|min:6',
            'id_perfil' => 'required|exists:perfils,id', // valida que el perfil exista en la tabla perfiles
            'estado'    => 'nullable|integer' 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'nombre.required'    => 'El nombre es obligatorio.',
            'nombre.max'         => 'El nombre no puede tener más de 100 caracteres.',
            
            'apellido.required'  => 'El apellido es obligatorio.',
            'apellido.max'       => 'El apellido no puede tener más de 100 caracteres.',
            
            'telefono.max'       => 'El teléfono no puede superar los 20 caracteres.',
            
            'email.required'     => 'El correo electrónico es requerido.',
            'email.email'        => 'Ingresá una dirección de correo válida.',
            'email.unique'       => 'Este correo electrónico ya está registrado.',
            
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 6 caracteres.',
            
            'id_perfil.required' => 'El perfil es obligatorio.',
            'id_perfil.exists'   => 'El perfil seleccionado no es válido.'
        ];
    }
}