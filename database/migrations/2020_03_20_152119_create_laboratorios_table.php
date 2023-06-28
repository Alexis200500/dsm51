<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->bigIncrements('id')->comments('Identificador del laboratorio');
            $table->string('laboratorio')->comments('Laboratorio');
            $table->string('abreviatura')->comments('Abreviatura del laboratorio');
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
        Schema::dropIfExists('laboratorios');
    }
}
