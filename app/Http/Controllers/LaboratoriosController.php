<?php

namespace App\Http\Controllers;

use App\Laboratorio;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Laboratorio as LaboratorioResource;
use Illuminate\Validation\Rule;

class LaboratoriosController extends Controller
{
    private $validationRules = [
        'laboratorio' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:laboratorios,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'laboratorio' => 'laboratorio'
        , 'abreviatura' => 'abreviatura'
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
        return LaboratorioResource::collection(Laboratorio::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($laboratorio = Laboratorio::create(
                $request->all()
            )) {
            return new LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $laboratorio = Laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new LaboratorioResource($laboratorio);
    }
    
    public function update(Request $request, $id)
    {
        $laboratorio = Laboratorio::find($id);
        if (null === $laboratorio) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('laboratorios')->ignore($laboratorio->id, 'id')]
        ])->validate();
        if ($laboratorio->update($request->all())) {
            return new LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $laboratorio = Laboratorio::find($id);
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
