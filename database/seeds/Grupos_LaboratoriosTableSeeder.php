<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Grupos_LaboratoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos_laboratorios')
        ->insert([
            [
                'laboratorio_id' => 1
                , 'cuatrimestre_id' => 1
                , 'direccion_id' => 1
                , 'carrera_id' => 1
                , 'asignatura_id' => 1
                , 'docente_id' => 1
                , 'dias_asignados' => 'Viernes,Sábado'
                , 'grupo' => 'DSM51'
                , 'lunes_inicio' => null
                , 'lunes_fin' => null
                , 'martes_inicio' => null
                , 'martes_fin' => null
                , 'miercoles_inicio' => null
                , 'miercoles_fin' => null
                , 'jueves_inicio' => null
                , 'jueves_fin' => null
                , 'viernes_inicio' => '07:00:00'
                , 'viernes_fin' => '08:40:00'
                , 'sabado_inicio' => '07:50:00'
                , 'sabado_fin' => '09:30:00'
                , 'domingo_inicio' => null
                , 'domingo_fin' => null
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]
            , [
                'laboratorio_id' => 1
                , 'cuatrimestre_id' => 1
                , 'direccion_id' => 1
                , 'carrera_id' => 1
                , 'asignatura_id' => 1
                , 'docente_id' => 1
                , 'dias_asignados' => 'Miércoles,Sábado'
                , 'grupo' => 'DSM53'
                , 'lunes_inicio' => null
                , 'lunes_fin' => null
                , 'martes_inicio' => null
                , 'martes_fin' => null
                , 'miercoles_inicio' => '07:00:00'
                , 'miercoles_fin' => '08:40:00'
                , 'jueves_inicio' => null
                , 'jueves_fin' => null
                , 'viernes_inicio' => null
                , 'viernes_fin' => null
                , 'sabado_inicio' => '09:30:00'
                , 'sabado_fin' => '11:10:00'
                , 'domingo_inicio' => null
                , 'domingo_fin' => null
                , 'estatus' => 'Activo'
                , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
                , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
