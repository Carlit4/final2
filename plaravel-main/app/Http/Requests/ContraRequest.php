<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContraRequest extends FormRequest
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
            'passog' => ['required'],
            'pass1' => ['required','min:4','max:60'],
            'pass2' => ['required', 'min:4','max:60']
        ];
    }
    
    public function messages(): array
    {
        return[
            'passog.required' => 'La contraseña actual es obligatoria!',
            'pass1.required' => 'La contraseña nueva es obligatoria',
            'pass1.min' => 'La contraseña nueva debe tener al menos 4 caracteres!',
            'pass1.max' => 'La contraseña nueva no debe mas de 60 caracteres',
            'pass2.required' => 'La confirmacion de la nueva contraseña es obligatoria!',
            'pass2.min' => 'La confirmacion de la contraseña nueva debe tener al menos 4 caracteres',
            'pass2.max' => 'La confirmacion de la contraeña nueva debe tener no mas de 60 caracteres'
        ];
    }
}
