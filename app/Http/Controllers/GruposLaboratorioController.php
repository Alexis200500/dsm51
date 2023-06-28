<?php

namespace App\Http\Controllers;

use App\GrupoLaboratorio;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\GrupoLaboratorio as GrupoLaboratorioResource;
use Illuminate\Validation\Rule;

class GruposLaboratorioController extends Controller
{
    private $validationRules = [
        'laboratorio_id' => 'required|integer|exists:laboratorios,id'
        , 'cuatrimestre_id' => 'required|integer|exists:cuatrimestres,id'
        , 'direccion_id' => 'required|integer|exists:direcciones,id'
        , 'carrera_id' => 'required|integer|exists:carreras,id'
        , 'laboratorio_id' => 'required|integer|exists:laboratorios,id'
        , 'docente_id' => 'required|integer|exists:users,id'
        , 'dias_asignados' => 'required|array'
        , 'grupo' => 'required|max:10|unique:grupos_laboratorios,grupo'
        , 'lunes_inicio'
        , 'lunes_fin'
        , 'martes_inicio'
        , 'martes_fin'
        , 'miercoles_inicio'
        , 'miercoles_fin'
        , 'jueves_inicio'
        , 'jueves_fin'
        , 'viernes_inicio'
        , 'viernes_fin'
        , 'sabado_inicio'
        , 'sabado_fin'
        , 'domingo_inicio'
        , 'domingo_fin'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'laboratorio_id' => 'laboratorio'
        , 'cuatrimestre_id' => 'cuatrimestre'
        , 'direccion_id' => 'direccion'
        , 'carrera_id' => 'carrera'
        , 'GrupoLaboratorio_id' => 'GrupoLaboratorio'
        , 'docente_id' => 'docente'
        , 'dias_asignados' => 'días asignados'
        , 'grupo' => 'grupo'
        , 'lunes_inicio' => 'lunes inicio'
        , 'lunes_fin' => 'lunes fin'
        , 'martes_inicio' => 'martes_inicio'
        , 'martes_fin' => 'martes fin'
        , 'miercoles_inicio' => 'miércoles inicio'
        , 'miercoles_fin' => 'miércoles fin'
        , 'jueves_inicio' => 'jueves inicio'
        , 'jueves_fin' => 'jueves fin'
        , 'viernes_inicio' => 'viernes inicio'
        , 'viernes_fin' => 'viernes fin'
        , 'sabado_inicio' => 'sábado inicio'
        , 'sabado_fin' => 'sábado fin'
        , 'domingo_inicio' => 'domingo inicio'
        , 'domingo_fin' => 'domingo fin'
        , 'estatus' => 'estatus'
    ];

    protected function setValidator(Request $request,
        $replaceValidationRules = [])
    {
        return Validator::make(
            $request->all()
            , array_merge(
                $this->validationRules
                , $replaceValidationRules
            )
        )
        ->setAttributeNames($this->attributeNames);
    }

    public function index (Request $request) {
        return GrupoLaboratorioResource::collection(GrupoLaboratorio::with(
            [
                'laboratorio:id,laboratorio'
                , 'cuatrimestre:id,cuatrimestre'
                , 'direccion:id,direccion'
                , 'carrera:id,carrera'
                , 'asignatura:id,asignatura'
                , 'docente:id,name'
            ]
        )->paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($GrupoLaboratorio = GrupoLaboratorio::create(
                $request->all()
            )) {
            return new GrupoLaboratorioResource($GrupoLaboratorio);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $GrupoLaboratorio = GrupoLaboratorio::find($id);
        if (null === $GrupoLaboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new GrupoLaboratorioResource($GrupoLaboratorio);
    }
    
    public function update(Request $request, $id)
    {
        $GrupoLaboratorio = GrupoLaboratorio::find($id);
        if (null === $GrupoLaboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'grupo' => ['required', Rule::unique('grupos_laboratorios')->ignore($GrupoLaboratorio->id, 'id')]
        ])->validate();
        if ($GrupoLaboratorio->update($request->all())) {
            return new GrupoLaboratorioResource($GrupoLaboratorio);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $GrupoLaboratorio = GrupoLaboratorio::find($id);
        if (null === $GrupoLaboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $GrupoLaboratorio->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
