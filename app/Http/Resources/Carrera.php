<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Carrera extends JsonResource
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
            'direccion_id' => $this->direccion_id,
            'direccion' => $this->direccion->direccion,
            'carrera' => $this->carrera,
            'abreviatura' => $this->abreviatura,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
