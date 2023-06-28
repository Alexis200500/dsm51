<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/formato', function(){
    set_time_limit(0);

    $archivo = uniqid('formato', true) . '.docx';
    $ruta_archivo = storage_path('app/' . $archivo);
    exec('"C:\\Program Files\\nodejs\\node.exe" "C:\\xampp\\htdocs\\dsm51\\reportes\\index.js" 1 "' . $ruta_archivo . '"', $salida, $retorno);

    if(Illuminate\Support\Facades\Storage::exists($archivo)){
        return Illuminate\Support\Facades\Storage::download($archivo, 'formato-de-uso-de-laboratorio.docx');
    }
    echo 'No encontrado';
})->name('formato');


Route::any('/{a?}', function () {
    return view('/welcome');
})->where('a', '^(?!api\/).*$')->name('reactjs');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
