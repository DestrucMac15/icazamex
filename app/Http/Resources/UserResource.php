<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
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
            'id' => array_get($this, 'id'),
            'name' => array_get($this, 'name'),
            'email' => array_get($this, 'email'),
            'password' => '',
            'role_id' => Arr::get($this->roles()->first(), 'id', 2),
        ];
    }
}
