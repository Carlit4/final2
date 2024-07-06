<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'patente' => ['required', 'min:6', 'max:8'],
            'marca' => ['required', 'min:3', 'max:15'],
            'anio' => ['required', 'integer'],
            'tipo' => ['required'],
            'estado' => ['required']
        ];
    }

    public function messages():array
    {
        return [
            'patente.required' => 'La patente del vehiculo es obligatoria!',
            'patente.min' => 'La patente debe tener al menos 6 caracteres!',
            'patente.max' => 'La patente debe tener no mas de 8 caracteres!',
            'marca.required' => 'La marca del vehiculo debe ser obligatoria!',
            'marca.min' => 'La marca debe tener al menos 3 caracteres!',
            'marca.max' => 'La marca debe tener no mas de 15 caracteres!',
            'anio.required' => 'El año del vehiculo es obligatorio!',
            //'anio.size' => 'El año del vehiculo debe tener 4 digitos!',
            'anio.integer' => 'El año del vehiculo debe ser numerico!',
            'tipo.required' => 'El tipo del vehiculo es obligatorio!',
            'estado.required' => 'El estado del vehiculo es obligatorio!'
        ];
    }
}
