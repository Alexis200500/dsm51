<?php

namespace App\Http\Controllers;

use App\Unidad_Medida;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Unidad_Medida as Unidad_MedidaResource;
use Illuminate\Validation\Rule;

class Unidades_MedidasController extends Controller
{
    private $validationRules = [
        'unidad_medida' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:unidades_medidas,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'unidad_medida' => 'unidad_medida'
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
        return Unidad_MedidaResource::collection(Unidad_Medida::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($umedida = Unidad_Medida::create(
                $request->all()
            )) {
            return new Unidad_MedidaResource($umedida);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $umedida = Unidad_Medida::find($id);
        if (null === $umedida) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new Unidad_MedidaResource($umedida);
    }
    
    public function update(Request $request, $id)
    {
        $umedida = Unidad_Medida::find($id);
        if (null === $umedida) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('unidades_medidas')->ignore($umedida->id, 'id')]
        ])->validate();
        if ($umedida->update($request->all())) {
            return new Unidad_MedidaResource($umedida);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $umedida = Unidad_Medida::find($id);
        if (null === $umedida) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $umedida->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
