<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Cuatrimestre;

class CuatrimestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuatrimestres')
            ->insert([
                'cuatrimestre' => '2020 01-04 (Enero - Abril)'
                , 'fecha_inicio' => '2020-01-07'
                , 'fecha_termino' => '2020-04-30'
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]);
    }
}
