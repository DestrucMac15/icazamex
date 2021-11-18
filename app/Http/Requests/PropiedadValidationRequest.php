<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadValidationRequest extends FormRequest
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
            'tipo_inmueble_id' => 'required|numeric',
            'precio_venta' => 'required|numeric|min:1',
            'country_id' => 'required|numeric|gt:0',
            'estado_id' => 'required|numeric|gt:0',
            'municipio_id' => 'required|numeric|gt:0',
            'localidad_id' => 'required|numeric|gt:0',
            'calle' => 'required|max:250',
        ];
    }
}
