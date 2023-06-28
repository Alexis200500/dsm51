<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DireccionesTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(AsignaturasTableSeeder::class);
        $this->call(LaboratoriosTableSeeder::class);
        $this->call(CuatrimestresTableSeeder::class);
        $this->call(Unidades_MedidasTableSeeder::class);
        $this->call(MaterialesTableSeeder::class);
        $this->call(DiasFeriadosTableSeeder::class);
        $this->call(Grupos_LaboratoriosTableSeeder::class);
        $this->call(Formatos_LaboratoriosTableSeeder::class);
        $this->call(DetalleFormatoLaboratorioTableSeeder::class);
    }
}
