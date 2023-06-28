<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Material as MaterialResource;
use Illuminate\Validation\Rule;
class MaterialesController extends Controller
{
    private $validationRules = [
        'unidad_medida_id' => 'required|integer|exists:unidades_medidas,id'
        , 'material' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:materiales,abreviatura'
        , 'tipo' => 'required|in:Equipo,Material,Reactivo'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'unidad_medida_id' => 'unidad_medida_id'
        , 'material' => 'material'
        , 'abreviatura' => 'abreviatura'
        ,'tipo' => 'tipo'
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
        return MaterialResource::collection(Material::with('unidad_medida:id,unidad_medida')->paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($material = Material::create(
                $request->all()
            )) {
            return new MaterialResource($material);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $material = Material::find($id);
        if (null === $material) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new MaterialResource($material);
    }
    
    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        if (null === $material) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('materiales')->ignore($material->id, 'id')]
        ])->validate();
        if ($material->update($request->all())) {
            return new MaterialResource($material);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $material = Material::find($id);
        if (null === $material) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $material->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
