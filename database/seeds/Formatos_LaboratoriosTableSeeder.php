<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Formatos_LaboratoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formatos_laboratorios')
            ->insert([
                [
                    'grupo_laboratorio_id' => 1
                    , 'asignatura_id' => 1
                    , 'docente_id' => 1
                    , 'numero_equipos_trabajo' => 20
                    , 'fecha_formato' => '2020-03-14'
                    , 'nombre_practica' => 'CRUD de catálogos'
                    , 'objetivo' => 'Crear CRUD de catálogos de aplicación de llenado de formatos de uso de laboratorio'
                    , 'observaciones' => 'Revisión de avances'
                    , 'archivo_formato' => '3-R-EDU-20.docx'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
                , [
                    'grupo_laboratorio_id' => 2
                    , 'asignatura_id' => 1
                    , 'docente_id' => 1
                    , 'numero_equipos_trabajo' => 20
                    , 'fecha_formato' => '2020-03-14'
                    , 'nombre_practica' => 'CRUD de catálogos'
                    , 'objetivo' => 'Crear CRUD de catálogos de aplicación de llenado de formatos de uso de laboratorio'
                    , 'observaciones' => 'Revisión de avances'
                    , 'archivo_formato' => '3-R-EDU-20.docx'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
            ]);
    }
}
