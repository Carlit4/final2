<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nombre' => ['required','min:2','max:30'],
            'email' => ['required'],
            'password' => ['required','min:4','max:30'],
            'perfil' => ['required']
        ];
    }

    public function messages():array
    {
        return [
            'nombre.required' => 'Indique el nombre del cliente!',
            //'nombre.alpha' => 'El nombre solo debe llevar letras!',
            'nombre.min' => 'El nombre debe tener 2 letras mínimo!',
            'nombre.max' => 'El nombre debe tener 20 letras máximo!',
            'email.required' => 'El correo debe ser obligatorio!',
            //'email.contains' => 'El correo debe tener un @!',
            'password.required' => 'La contraseña debe ser obligatoria!',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres!',
            'password.max' => 'La contraaseña no debe tener mas de 30 caracteres!'
        ];
    }
}
