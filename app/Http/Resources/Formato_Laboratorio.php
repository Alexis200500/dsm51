<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Formato_Laboratorio extends JsonResource
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
        'grupo_laboratorio_id'=>$this->grupo_laboratorio_id,
        'grupo_laboratorio'=>$this->grupo_laboratorio->laboratorio_id,
        'asignatura_id'=>$this->asignatura_id,
        'asignatura' => $this->asignatura->asignatura, 
        'docente_id'=>$this->docente_id,
        'docente'=>$this->docente->name,   
        'numero_equipos_trabajo'=>$this->numero_equipos_trabajo,
        'fecha_formato'=>$this->fecha_formato,
        'nombre_practica'=>$this->nombre_practica,
        'objetivo' =>$this->objetivo,
        'observaciones'=>$this->observaciones,
        'archivo_formato'=>$this->archivo_formato
    ];
    }
}
