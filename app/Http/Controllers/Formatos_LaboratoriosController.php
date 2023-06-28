<?php

namespace App\Http\Controllers;

use App\Formato_Laboratorio;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Formato_Laboratorio as Formato_LaboratorioResource;
use Illuminate\Validation\Rule;

class Formatos_LaboratoriosController extends Controller
{
    private $validationRules = [
        'grupo_laboratorio_id'=>'required|integer|exists:grupos_laboratorios,id' ,
        'asignatura_id' =>'required|integer|exists:asignaturas,id',
        'docente_id' =>'required|integer|exists:users,id',
        'numero_equipos_trabajo'=>'required|integer',
        'fecha_formato',
        'nombre_practica',
        'objetivo',
        'observaciones',
        'archivo_formato',
    ];
    
    private $attributeNames = [
        'grupo_laboratorio_id'=>'grupo_laboratorio_id' ,
        'asignatura_id' =>'asignatura_id',
        'docente_id' =>'docente_id',
        'numero_equipos_trabajo'=>'numero_equipos_trabajo',
        'fecha_formato'=>'fecha_formato',
        'nombre_practica'=>'nombre_practica',
        'objetivo'=>'objetivo',
        'observaciones'=>'observaciones',
        'archivo_formato'=>'archivo_formato',
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
        return Formato_LaboratorioResource::collection(Formato_Laboratorio::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($laboratorio = Formato_Laboratorio::create(
                $request->all()
            )) {
            return new Formato_LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $laboratorio = Formato_Laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new Formato_LaboratorioResource($laboratorio);
    }
    
    public function update(Request $request, $id)
    {
        $laboratorio = Formato_Laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            // 'inicio' => ['required', Rule::unique('grupos_laboratorios')->ignore($laboratorio->id, 'id')]
        ])->validate();
        if ($laboratorio->update($request->all())) {
            return new Formato_LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $laboratorio = Formato_Laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $laboratorio->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
