<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\DiaFeriado;


class DiasFeriadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias_feriados')
            ->insert([
                ['id' => '2020-03-16']
                , ['id' => '2020-03-20']
            ]);
    }
}
