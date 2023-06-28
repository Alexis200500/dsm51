<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Detalle_Formato_Laboratorio extends JsonResource
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
            'formato_laboratorio_id'=>$this->formato_laboratorio_id,
            'formato_laboratorio'=>$this->formato_laboratorio->id,
            'material_id'=> $this->material_id,
            'material' => $this->material->material, 
            'unidad_medida_id'=> $this->unidad_medida_id, 
            'unidad_medida' => $this->unidad_medida->unidad_medida,
            'cantidad'=> $this->cantidad,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
