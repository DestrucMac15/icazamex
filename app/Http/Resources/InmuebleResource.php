<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class InmuebleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $fecha = Carbon::parse(Arr::get($this, 'antiguedad_fecha'));

        $imagenes = Arr::get($this, 'imagenes', []);
        $imgidx = Arr::pluck($imagenes, 'id');
        $images = collect($imagenes)->reduce(function($carry, $item){
            array_push($carry, [
                'id' => Arr::get($item, 'id'),
                'nombre' => Arr::get($item, 'nombre'),
                'titulo' => Arr::get($item, 'titulo'),
                'url' => asset("storage/".Arr::get($item, 'nombre')),
            ]);
            return $carry;
        }, []);

        $archivos = Arr::get($this, 'archivos', []);
        $fileidx = Arr::pluck($archivos, 'id');
        $files = collect($archivos)->reduce(function($carry, $item){
            array_push($carry, [
                'id' => Arr::get($item, 'id'),
                'nombre' => Arr::get($item, 'nombre'),
                'titulo' => Arr::get($item, 'titulo'),
                'url' => asset("storage/".Arr::get($item, 'nombre')),
            ]);
            return $carry;
        }, []);

        $v = Arr::get($this, 'videos', []);
        $videoidx = Arr::pluck($v, 'id');

        $videos = collect($v)->reduce(function($carry, $item){
            array_push($carry, [
                'id' => Arr::get($item, 'id'),
                'url' => Arr::get($item, 'nombre'),
                'titulo' => Arr::get($item, 'titulo'),
            ]);
            return $carry;
        }, []);

        $antiguedad = Arr::get($this, 'antiguedad');
        if(!empty($antiguedad)){
            $antiguedad = explode('/', $antiguedad);
        }

        return [
            'id' => $this->id,
            'inmueble' => $this->inmueble,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'moneda_venta' => Arr::get($this, 'moneda_venta', 'MN'),
            'precio_venta' => Arr::get($this, 'precio_venta'),
            'moneda_renta' => Arr::get($this, 'moneda_renta', 'MN'),
            'precio_renta' => Arr::get($this, 'precio_renta'),
            'recamaras' => Arr::get($this, 'recamaras', 1),
            'banios' => Arr::get($this, 'banios', 1),
            'medio_banio' => Arr::get($this, 'medio_banio', 0),
            'estacionamiento' => Arr::get($this, 'estacionamiento', 1),
            'superficie' => Arr::get($this, 'superficie', 'M2'),
            'superficie_construida' => Arr::get($this, 'superficie_construida', 0),
            'superficie_terreno' => Arr::get($this, 'superficie_terreno', 0),
            'superficie_jardin' => Arr::get($this, 'superficie_jardin', 0),
            'venta' => Arr::get($this, 'venta', true),
            'renta' => Arr::get($this, 'renta', false),
            'tipo_id' => Arr::get($this, 'tipo_id', 1),
            'tipo_inmueble' => Arr::get($this, 'tipoinmueble.titulo', ''),
            'antiguedad_mes' => !empty($antiguedad) ? $antiguedad[0] : '',
            'antiguedad_anio' => !empty($antiguedad) ? $antiguedad[1] : '',
            'antiguedad_fecha' => $fecha->format('Y-m-d'),
            'antiguedad_anios' => Arr::get($this, 'antiguedad_anios', 1),
            'country_id' => Arr::get($this, 'country_id', 484),
            'estado_id' => Arr::get($this, 'estado_id', 9),
            'municipio_id' => Arr::get($this, 'municipio_id'),
            'localidad_id' => Arr::get($this, 'localidad_id'),
            'tipo_operacion_id' => Arr::get($this, 'tipo_operacion_id'),
            'tipo_operacion' => Arr::get($this, 'tipoOperacion.titulo', ''),
            'antiguedad_id' => Arr::get($this, 'antiguedad_id', 1),
            'tipo_inmueble_id' => Arr::get($this, 'tipo_inmueble_id'),
            'mantenimiento_venta' => Arr::get($this, 'mantenimiento_venta'),

            'calle' => Arr::get($this, 'calle'),
            'interior' => Arr::get($this, 'interior'),
            'exterior' => Arr::get($this, 'exterior'),
            'codigo_postal' => Arr::get($this, 'codigo_postal'),
            'pisos' => Arr::get($this, 'pisos'),
            'piso_actual' => Arr::get($this, 'piso_actual'),
            'largo' => Arr::get($this, 'largo'),
            'frente' => Arr::get($this, 'frente'),
            'estado_conservacion_id' => Arr::get($this, 'estado_conservacion_id', 1),
            'metros_altura' => Arr::get($this, 'metros_altura'),
            'metros2_bodega' => Arr::get($this, 'metros2_bodega'),
            'metros2_oficina' => Arr::get($this, 'metros2_oficina'),
            'soporte_piso' => Arr::get($this, 'soporte_piso'),
            'iluminacion' => Arr::get($this, 'iluminacion'),

            'uso_suelo' => Arr::get($this, 'uso_suelo'),
            'numero_frentes' => Arr::get($this, 'numero_frentes'),
            'ubicacion_manzana' => Arr::get($this, 'ubicacion_manzana'),
            'oferta' => Arr::get($this, 'oferta', false),

            'created_at' => Arr::get($this, 'created_at'),
            'display_created_at' => Arr::get($this, 'created_at', Carbon::now())->format('d/m/Y'),
            'servicios' => Arr::pluck(Arr::get($this, 'servicios', []), 'id'),
            'generales' => Arr::pluck(Arr::get($this, 'generales', []), 'id'),
            'exteriores' => Arr::pluck(Arr::get($this, 'exteriores', []), 'id'),
            'amenidades' => Arr::pluck(Arr::get($this, 'amenidades', []), 'id'),
            'restricciones' => Arr::pluck(Arr::get($this, 'restricciones', []), 'id'),

            'imgidx' => $imgidx,
            'imagenes' => $images,
            'fileidx' => $fileidx,
            'files' => $files,
            'videoidx' => $videoidx,
            'videos' => $videos,

            'forma_entrega_id' => Arr::get($this, 'forma_entrega_id', 1),
            'forma_terreno_id' => Arr::get($this, 'forma_terreno_id', 1),
            'elevadores' => Arr::get($this, 'elevadores', 0),
            'niveles_construidos' => Arr::get($this, 'niveles_construidos', 0),
            'numero_oficinas' => Arr::get($this, 'numero_oficinas', 0),
            'numero_departamentos' => Arr::get($this, 'numero_departamentos', 0),

            'roof_garden' => Arr::get($this, 'roof_garden', 'privado'),
            'metraje_desde' => Arr::get($this, 'metraje_desde', 0),
            'metraje_hasta' => Arr::get($this, 'metraje_hasta', 0),
            'esquina_con' => Arr::get($this, 'esquina_con'),
            'asesor_nombre' => Arr::get($this, 'asesor_nombre'),
            'asesor_email' => Arr::get($this, 'asesor_email'),
            'asesor_telefono' => Arr::get($this, 'asesor_telefono'),


            'roof_garden' => Arr::get($this, 'roof_garden', 'privado'),
            'metraje_desde' => Arr::get($this, 'metraje_desde', 0),
            'metraje_hasta' => Arr::get($this, 'metraje_hasta', 0),
            'esquina_con' => Arr::get($this, 'esquina_con'),
            'asesor_nombre' => Arr::get($this, 'asesor_nombre'),
            'asesor_email' => Arr::get($this, 'asesor_email'),
            'asesor_telefono' => Arr::get($this, 'asesor_telefono'),
            'precio_desde' => Arr::get($this, 'precio_desde', 0),
            'precio_hasta' => Arr::get($this, 'precio_hasta', 0),
            'precio_x_m2' => Arr::get($this, 'precio_x_m2', 0),
            'asesor_id' => Arr::get($this, 'asesor_id'),
        ];
    }
}
