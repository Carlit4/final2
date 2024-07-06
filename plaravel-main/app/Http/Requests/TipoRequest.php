<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoRequest extends FormRequest
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
            'nom_tipo' => ['required', 'min:3', 'max:15', 'alpha'],
            'precio' => ['required','integer']
        ];
    }

    public function messages(): array
    {
        return [
            'nom_tipo.required' => 'El nombre del tipo de vehiculo es obligatorio!',
            'nom_tipo.min' => 'El nombre del tipo de vehiculo debe tener al menos 3 caracteres!',
            'nom_tipo.max' => 'El nombre del tipo de vehiculo debe tener no mas de 15 caracteres!',
            'nom_tipo.alpha' => 'El nombre del tipo de vehiculo debe tener letras!',
            'precio.required' => 'El precio del tipo de vehiculo es obligatorio!',
            'precio.integer' => 'El precio del tipo de vehiculo debe ser numerico!'
        ];
    }
}
