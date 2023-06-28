<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatosLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos_laboratorios', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador');
            $table->unsignedInteger('grupo_laboratorio_id')->comment('Grupo-Laboratorio');
            $table->unsignedInteger('asignatura_id')->comment('Asignatura');
            $table->unsignedInteger('docente_id')->comment('Docente');
            $table->unsignedInteger('numero_equipos_trabajo')->comment('Número de equipos de trabajo');
            $table->date('fecha_formato')->comment('Fecha de formato');
            $table->string('nombre_practica', 200)->comment('Nombre de la práctica');
            $table->text('objetivo')->comment('Objetivo');
            $table->text('observaciones')->comment('Observaciones');
            $table->string('archivo_formato', 100)->comment('Nombre del archivo de formato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formatos_laboratorios');
    }
}
