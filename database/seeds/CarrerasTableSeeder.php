<?php

use Illuminate\Database\Seeder;
use App\Carrera;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::insert(
            [
                [
                    'direccion_id' => 1
                    , 'carrera' => 'Desarrollo de Software Multiplataforma'
                    , 'abreviatura' => 'DSM'
                    , 'estatus' => 'Activo'
                    , 'created_at' => '2020-01-11 08:51:00'
                    , 'updated_at' => '2020-01-11 08:51:00'
                ]
                , [
                    'direccion_id' => 1
                    , 'carrera' => 'Infraestructura de Redes Digitales'
                    , 'abreviatura' => 'IRD'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]                , [
                    'direccion_id' => 3
                    , 'carrera' => 'Mecatrónica Área Sistema de Manufactura Flexible'
                    , 'abreviatura' => 'AL'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]           , [
                    'direccion_id' => 4
                    , 'carrera' => 'Desarrollo de Negocios, Área Mercadotecnia'
                    , 'abreviatura' => 'AL'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]

                
            ]
        );
    }
}
