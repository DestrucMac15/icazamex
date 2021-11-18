<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class InversionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'inmueble_id' => $this->inmueble_id,
            'titulo' => $this->titulo,
            'nivel' => Arr::get($this, 'nivel'),
            'balcones' => Arr::get($this, 'balcones', 0),
            'habitaciones' => Arr::get($this, 'habitaciones', 1),
            'banios' => Arr::get($this, 'banios', 1),
            'estacionamientos' => Arr::get($this, 'estacionamientos', 1),
            'm2' => Arr::get($this, 'm2', 0),
            'm2_numero' => implode('', [number_format(Arr::get($this, 'm2', 0), 2), ' ', 'm&sup2;']),
            'patio' => Arr::get($this, 'patio', 0),//en m2
            'patio_numero' => implode('', [number_format(Arr::get($this, 'patio', 0), 2), ' ', 'm&sup2;']),
            'precio' => Arr::get($this, 'precio', 0),
            'precio_moneda' => implode('', ['$', number_format(Arr::get($this, 'precio', 0), 2)]),
            'm2_total' => Arr::get($this, 'm2', 0) + Arr::get($this, 'patio', 0),
            'estatus' => Arr::get($this, 'estatus', 'disponible'),
        ];
    }
}
