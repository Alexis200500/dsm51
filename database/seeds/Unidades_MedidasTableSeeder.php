<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Unidad_Medida;

class Unidades_MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades_medidas')
        ->insert([
            [

                'unidad_medida' => 'Equipo cómputo'
                , 'abreviatura' => 'EQU'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ], [

                'unidad_medida' => 'Software'
                , 'abreviatura' => 'SOF'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]
            , [

                'unidad_medida' => 'Mililitro'
                , 'abreviatura' => 'ml'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
