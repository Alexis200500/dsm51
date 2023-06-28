<?php

namespace App\Http\Controllers;

use App\Cuatrimestre;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Cuatrimestre as CuatrimestreResource;
use Illuminate\Validation\Rule;

class CuatrimestresController extends Controller
{
    private $validationRules = [
        'cuatrimestre' => 'required|min:5|max:255'
        , 'fecha_inicio'
        , 'fecha_termino'        
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'cuatrimestre' => 'cuatrimestre'
        , 'fecha_inicio' => 'fecha_inicio'
        , 'fecha_termino' => 'fecha_termino'
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
        return CuatrimestreResource::collection(Cuatrimestre::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($cuatrimestre = Cuatrimestre::create(
                $request->all()
            )) {
            return new CuatrimestreResource($cuatrimestre);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $cuatrimestre = Cuatrimestre::find($id);
        if (null === $cuatrimestre) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new CuatrimestreResource($cuatrimestre);
    }
    
    public function update(Request $request, $id)
    {
        $cuatrimestre = Cuatrimestre::find($id);
        if (null === $cuatrimestre) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'fecha_inicio' => ['required', Rule::unique('cuatrimestres')->ignore($cuatrimestre->id, 'id')]
        ])->validate();
        if ($cuatrimestre->update($request->all())) {
            return new CuatrimestreResource($cuatrimestre);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $cuatrimestre = Cuatrimestre::find($id);
        if (null === $cuatrimestre) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $cuatrimestre->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
