<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Direccion as DireccionResource;
use Illuminate\Validation\Rule;

class DireccionesController extends Controller
{
    private $validationRules = [
        'direccion' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:direcciones,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'direccion' => 'direccion'
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
        return DireccionResource::collection(Direccion::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($direccion = Direccion::create(
                $request->all()
            )) {
            return new DireccionResource($direccion);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $direccion = Direccion::find($id);
        if (null === $direccion) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new DireccionResource($direccion);
    }
    
    public function update(Request $request, $id)
    {
        $direccion = Direccion::find($id);
        if (null === $direccion) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('direcciones')->ignore($direccion->id, 'id')]
        ])->validate();
        if ($direccion->update($request->all())) {
            return new DireccionResource($direccion);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $direccion = Direccion::find($id);
        if (null === $direccion) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $direccion->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
