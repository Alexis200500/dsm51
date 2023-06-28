<?php

use Illuminate\Database\Seeder;
use App\Asignatura;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignatura::insert(
            [
                [
                    'carrera_id' => 1
                    , 'asignatura' => 'Calculo Diferencial'
                    , 'abreviatura' => 'CD'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
                ,
                [
                    'carrera_id' => 3
                    , 'asignatura' => 'Álgebra Lineal'
                    , 'abreviatura' => 'AL'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
                ,
                [
                    'carrera_id' => 2
                    , 'asignatura' => 'Interconexión de Redes'
                    , 'abreviatura' => 'AL'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]

            ]
        );
    }
}
