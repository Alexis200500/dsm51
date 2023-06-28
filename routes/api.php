<?php

use Illuminate\Http\Request;

use App\Http\Resources\Usuario as UsuarioResource;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/usuarios', function (Request $request) {
    return UsuarioResource::collection(User::paginate());
});

Route::group(['middleware' => ['auth:api']], function() {
    Route::resource('usuarios', 'UsuariosController')
        ->except(['index', 'create', 'edit']);
    Route::resource('direcciones', 'DireccionesController')
        ->except(['create', 'edit']);
    Route::resource('carreras', 'CarrerasController')
        ->except(['create', 'edit']);
    Route::resource('asignaturas', 'AsignaturasController')
        ->except(['create', 'edit']);
    Route::resource('laboratorios', 'LaboratoriosController')
        ->except(['create', 'edit']);
    Route::resource('cuatrimestres', 'CuatrimestresController')
        ->except(['create', 'edit']);
    Route::resource('unidades_medidas', 'Unidades_MedidasController')
        ->except(['create', 'edit']);
    Route::resource('materiales', 'MaterialesController')
        ->except(['create', 'edit']);    
    Route::resource('dias_feriados', 'Dias_feriadosController')
        ->except(['create', 'edit']);      
    Route::resource('grupos_laboratorios', 'GruposLaboratorioController')
        ->except(['create', 'edit']); 
    Route::resource('formatos_laboratorios', 'Formatos_LaboratoriosController')
        ->except(['create', 'edit']); 
    Route::resource('detalle_formato_laboratorio', 'Detalle_Formato_LaboratorioController')
        ->except(['create', 'edit']); 
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
GET: /usuarios
Route::get('/usuarios', 'UsuariosController@index');
GET: /usuarios/{id}
Route::get('/usuarios/{id}', 'UsuariosController@show');
Route::get('/usuarios/create', 'UsuariosController@create');
POST: /usuarios
Route::post('/usuarios/save', 'UsuariosController@save');
Route::get('/usuarios/edit/{id}', 'UsuariosController@edit');
PATCH, PUT: /usuarios/{id}
Route::post('/usuarios/update/{id}', 'UsuariosController@update');
DELETE: /usuarios/{id}
Route::post('/usuarios/delete/{id}', 'UsuariosController@delete');
*/