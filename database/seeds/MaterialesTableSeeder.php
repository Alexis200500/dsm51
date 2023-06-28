<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MaterialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiales')
        ->insert([
            [

                'unidad_medida_id' => 1
                , 'material' => 'Equipo de cómputo de escritorio'
                , 'abreviatura' => 'ECE'
                , 'tipo' => 'Equipo'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ] , [

                'unidad_medida_id' => 2
                , 'material' => 'Visual Studio Code'
                , 'abreviatura' => 'VSC'
                , 'tipo' => 'Equipo'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
