<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrupoLaboratorio extends JsonResource
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
            'laboratorio_id'=> $this->laboratorio_id, 
            'laboratorio'=>$this->laboratorio->laboratorio,
            'cuatrimestre_id'=> $this->cuatrimestre_id,
            'cuatrimestre' => $this->cuatrimestre->cuatrimestre, 
            'direccion_id'=> $this->direccion_id, 
            'direccion' => $this->direccion->direccion,
            'carrera_id'=> $this->carrera_id,
            'carrera' => $this->carrera->carrera,
            'asignatura_id'=> $this->asignatura_id,
            'asignatura' => $this->asignatura->asignatura, 
            'docente_id'=> $this->docente_id, 
            'docente'=>$this->docente->name,   
            'dias_asignados'=> $this->dias_asignados, 
            'grupo'=> $this->grupo,
            'lunes_inicio'=> $this->lunes_inicio,
            'lunes_fin'=> $this->lunes_fin,
            'martes_inicio'=> $this->martes_inicio,
            'martes_fin'=> $this->martes_fin,
            'miercoles_inicio'=> $this->miercoles_inicio,
            'miercoles_fin'=> $this->miercoles_fin,
            'jueves_inicio'=> $this->jueves_inicio,
            'jueves_fin'=> $this->jueves_fin,
            'viernes_inicio'=> $this->viernes_inicio,
            'viernes_fin'=> $this->viernes_fin,
            'sabado_inicio'=> $this->sabado_inicio,
            'sabado_fin'=> $this->sabado_fin,
            'domingo_inicio'=> $this->domingo_inicio,
            'domingo_fin'=> $this->domingo_fin,
            'estatus'=> $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
