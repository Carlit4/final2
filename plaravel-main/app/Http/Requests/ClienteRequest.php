<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest

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
            'rut' => ['required','min:9','max:10'],
            'nombre' => ['required','alpha','min:2','max:20'],
            'fecha_nac' => ['required'],
        ];
    }

    public function messages():array
    {
        return [
            'rut.required' => 'Indique el rut del cliente!',
            'rut.min' => 'El rut debe tener al menos 9 caracteres!',
            'rut.max' => 'El rut no debe tener mas de 10 caracteres!',
            'nombre.required' => 'Indique el nombre del cliente!',
            'nombre.alpha' => 'El nombre solo debe llevar letras!',
            'nombre.min' => 'El nombre debe tener 2 letras mínimo!',
            'nombre.max' => 'El nombre debe tener 20 letras máximo!',
            'fecha_nac' => 'Indique la fecha de nacimiento del cliente!',
        ];
    }
}
