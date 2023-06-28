<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Material extends JsonResource
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
            'unidad_medida_id' => $this->unidad_medida_id,
            'unidad_medida' => $this->unidad_medida->unidad_medida,
            'material' => $this->material,
            'abreviatura' => $this->abreviatura,
            'tipo' => $this->tipo,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
