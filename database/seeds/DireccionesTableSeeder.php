<?php

use Illuminate\Database\Seeder;
use App\Direccion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direccion::insert(
            [
                [
                    'direccion' => 'Tecnologías de la Información y Comunicación'
                    , 'abreviatura' => 'TIC'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ] 
                ,
                [
                    'direccion' => 'Mantenimiento Industrial'
                    , 'abreviatura' => 'MI'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
                ,
                [
                    'direccion' => 'Mecatronica'
                    , 'abreviatura' => 'MEC'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
                ,
                [
                    'direccion' => 'Innovación de Negocios y Mercadotecnia'
                    , 'abreviatura' => 'MEC'
                    , 'estatus' => 'Activo'
                    , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                    , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
