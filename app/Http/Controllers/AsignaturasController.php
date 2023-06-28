<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Asignatura as AsignaturaResource;
use Illuminate\Validation\Rule;

class AsignaturasController extends Controller
{
    private $validationRules = [
        'carrera_id' => 'required|integer|exists:carreras,id'
        , 'asignatura' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:asignaturas,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'carrera_id' => 'carrera'
        , 'asignatura' => 'asignatura'
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
        return AsignaturaResource::collection(Asignatura::with('carrera:id,carrera')->paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($asignatura = Asignatura::create(
                $request->all()
            )) {
            return new AsignaturaResource($asignatura);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $asignatura = Asignatura::find($id);
        if (null === $asignatura) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new AsignaturaResource($asignatura);
    }
    
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);
        if (null === $asignatura) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('asignaturas')->ignore($asignatura->id, 'id')]
        ])->validate();
        if ($asignatura->update($request->all())) {
            return new AsignaturaResource($asignatura);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);
        if (null === $asignatura) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $asignatura->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
