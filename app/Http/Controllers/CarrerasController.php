<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Carrera as CarreraResource;
use Illuminate\Validation\Rule;

class CarrerasController extends Controller
{
    private $validationRules = [
        'direccion_id' => 'required|integer|exists:direcciones,id'
        , 'carrera' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:1|max:10|unique:carreras,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
    ];
    
    private $attributeNames = [
        'direccion_id' => 'dirección'
        , 'carrera' => 'carrera'
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
        $campos = ['carrera', 'abreviatura', 'estatus'];
        $orden = ['asc', 'desc'];
        $estatus = ['Activo', 'Inactivo'];

        $ordenar_por = null != $request->ordenar_por 
            && in_array($request->ordenar_por, $campos)
            ? $request->ordenar_por
            : $campos[0];

        $o = null != $request->orden 
            && in_array($request->orden, $orden)
            ? $request->orden
            : $orden[0];

        $estatus = null != $request->estatus 
            && in_array($request->estatus, $estatus)
            ? $request->estatus
            : $estatus[0];



        return CarreraResource::collection(Carrera::with('direccion:id,direccion')
            
            ->when($request->carrera, function ($query) use ($request) {
             return $query->where('carrera', 'like', '%' . $request->carrera .'%');
            })

            ->when($request->abreviatura, function ($query) use ($request) {
                return $query->where('abreviatura', 'like','%' . $request->abreviatura .'%');
               })


            ->when($estatus, function ($query) use ($estatus) {
                return $query->where('estatus', '=', $estatus);
            })

      //  ->orderBy($ordenar_por, $o) //Ordenar  
        ->paginate());
    }
    
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        if ($carrera = Carrera::create(
                $request->all()
            )) {
            return new CarreraResource($carrera);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $carrera = Carrera::with('direccion:id,direccion')->find($id);
        if (null === $carrera) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        return new CarreraResource($carrera);
    }
    
    public function update(Request $request, $id)
    {
        $carrera = Carrera::with('direccion:id,direccion')->find($id);
        if (null === $carrera) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('carreras')->ignore($carrera->id, 'id')]
        ])->validate();
        if ($carrera->update($request->all())) {
            return new CarreraResource($carrera);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: ' . $id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        if (null === $carrera) {
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: ' . $id]
            ], 404);
        }
        $carrera->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
