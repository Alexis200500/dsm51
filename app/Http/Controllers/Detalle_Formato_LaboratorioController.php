<?php

namespace App\Http\Controllers;

use App\detalle_formato_laboratorio;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Detalle_Formato_Laboratorio as Detalle_Formato_LaboratorioResource;
use Illuminate\Validation\Rule;

class Detalle_Formato_LaboratorioController extends Controller
{
    private $validationRules = [
        'formato_laboratorio_id'=>'required|integer|exists:formatos_laboratorios,id' ,
        'material_id' =>'required|integer|exists:materiales,id',
        'unidad_medida_id' =>'required|integer|exists:unidades_medidas,id',
        'cantidad'=>'required|integer',

    ];
    
    private $attributeNames = [
        'formato_laboratorio_id'=>'formato_laboratorio_id' ,
        'material_id' =>'material_id',
        'unidad_medida_id' =>'unidad_medida_id',
        'cantidad'=>'cantidad',
      
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
        return Detalle_Formato_LaboratorioResource::collection(detalle_formato_laboratorio::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($laboratorio = detalle_formato_laboratorio::create(
                $request->all()
            )) {
            return new Detalle_Formato_LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $laboratorio = detalle_formato_laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new Detalle_Formato_LaboratorioResource($laboratorio);
    }
    
    public function update(Request $request, $id)
    {
        $laboratorio = detalle_formato_laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            // 'inicio' => ['required', Rule::unique('grupos_laboratorios')->ignore($laboratorio->id, 'id')]
        ])->validate();
        if ($laboratorio->update($request->all())) {
            return new Detalle_Formato_LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $laboratorio = detalle_formato_laboratorio::find($id);
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
