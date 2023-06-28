<?php

namespace App\Http\Controllers;

use App\DiaFeriado;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Dia_feriado as DiaFeriadoResource;
use Illuminate\Validation\Rule;

class Dias_feriadosController extends Controller
{

    private $validationRules = [
        'id' => 'required|date_format:Y-m-d|unique:dias_feriados,id'
    ];
    
    private $attributeNames = [
        'id' => 'día feriado'
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
        return DiaFeriadoResource::collection(DiaFeriado::paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($dia_feriado = DiaFeriado::create(
                $request->all()
            )) {
            return new DiaFeriadoResource($dia_feriado);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $dia_feriado = DiaFeriado::find($id);
        if (null === $dia_feriado) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new DiaFeriadoResource($dia_feriado);
    }
    
    public function update(Request $request, $id)
    {
        $dia_feriado = DiaFeriado::find($id);
        if (null === $dia_feriado) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'id' => ['required', Rule::unique('dias_feriados')->ignore($dia_feriado->id, 'id')]
        ])->validate();
        if ($dia_feriado->update($request->all())) {
            return new DiaFeriadoResource($dia_feriado);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $dia_feriado = DiaFeriado::find($id);
        if (null === $dia_feriado) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $dia_feriado->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
