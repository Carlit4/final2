<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArriendoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'rut_cliente' => ['required'],
            'fecha_ini' => ['required'],
            'hora_inicio' => ['required'],
            'fecha_ter' => ['required'],
            'hora_termino' => ['required'],
            //'fecha_devolucion' => ['required'],
            //'hora_devolucion' => ['required'],
            'img_rec'=>['required'],
            //'img_ent' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'rut_cliente.required' => 'El rut del cliente es obligatorio!',
            'fecha_ini.required' => 'La fecha de inicio es obligatoria!',
            'hora_inicio.required' => 'La hora de inicio es obligatoria!',
            'fecha_ter.required' => 'La fecha de termino es obligatoria!',
            'hora_termino.required' => 'La hora de termino es obligatoria!',
            'img_ent.required' => 'La imagen de entrega es obligatoria!',
        ];
    }
}
