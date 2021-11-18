<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imagenes = Arr::get($this, 'imagenes', []);
        $idx = Arr::pluck($imagenes, 'id');
        $images = collect($imagenes)->reduce(function($carry, $item){
            array_push($carry, [
                'id' => Arr::get($item, 'id'),
                'nombre' => Arr::get($item, 'nombre'),
                'url' => asset("storage/".Arr::get($item, 'nombre')),
            ]);

            return $carry;
        }, []);

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'tags' => $this->tags,
            'imgidx' => $idx,
            'imagenes' => $images,
        ];
    }
}
