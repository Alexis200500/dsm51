<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la carrera');
            $table->unsignedInteger('carrera_id')->comment('Referencia a la tabla de carreras');
            $table->string('asignatura', 100)->comment('Guarda el nombre de la asignatura');
            $table->string('abreviatura', 10)->comment('Guarda la abreviatura de la dirección, ejemplo: TIC');
            $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
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
        Schema::dropIfExists('asignaturas');
    }
}
