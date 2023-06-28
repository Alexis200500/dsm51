<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposLaboratorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('grupos_laboratorios', function (Blueprint $table) {
                $table->bigIncrements('id')->comment('Identificador');
                $table->unsignedInteger('laboratorio_id')->comment('Laboratorio');
                $table->unsignedInteger('cuatrimestre_id')->comment('Cuatrimestre');
                $table->unsignedInteger('direccion_id')->comment('Dirección');
                $table->unsignedInteger('carrera_id')->comment('Carrera');
                $table->unsignedInteger('asignatura_id')->comment('Asignatura');
                $table->unsignedInteger('docente_id')->comment('Docente');
                $table->enum('dias_asignados', ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'])->comment('Días asignados');
                $table->string('grupo', 10)->comment('Clave del grupo');
                $table->time('lunes_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('lunes_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('martes_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('martes_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('miercoles_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('miercoles_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('jueves_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('jueves_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('viernes_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('viernes_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('sabado_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('sabado_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->time('domingo_inicio', 0)->nullable()->comment('Hora de inicio uso laboratorio');
                $table->time('domingo_fin', 0)->nullable()->comment('Hora de término uso de laboratorio');
                $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
                $table->timestamps();
        });

        $table_prefix = DB::getTablePrefix();
        $sql = <<<fin
alter table `{$table_prefix}grupos_laboratorios` change `dias_asignados` `dias_asignados` set('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
fin;
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_laboratorios');
    }
}
