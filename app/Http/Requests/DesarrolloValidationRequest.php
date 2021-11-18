<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesarrolloValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'tipo_operacion_id' => 'required|numeric|gt:0',

            'country_id' => 'required|numeric|gt:0',
            'estado_id' => 'required|numeric|gt:0',
            'municipio_id' => 'required|numeric|gt:0',
            'localidad_id' => 'required|numeric|gt:0',
            'calle' => 'required|max:250',


            'recamaras' => 'numeric|min:0|max:15',
            'banios' => 'numeric|min:0|max:15',
            'medio_banio' => 'numeric|min:0|max:15',
            'estacionamiento' => 'numeric|min:0|max:15',
            'superficie_construida' => 'required|numeric|min:0',
            'superficie_terreno' => 'required|numeric|min:0',


            'estado_id' => 'required|numeric',
            'municipio_id' => 'required|numeric',
            'localidad_id' => 'required|numeric',

            'estado_conservacion_id' => 'required|numeric|gt:0',
        ];
    }
}
