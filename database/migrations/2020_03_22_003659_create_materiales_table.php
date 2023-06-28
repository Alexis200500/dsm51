<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador');
            $table->unsignedInteger('unidad_medida_id')->comment('Unidad de medida');
            $table->string('material', 100)->comment('Material');
            $table->string('abreviatura', 10)->comment('Abreviatura');
            $table->enum('tipo', ['Equipo', 'Material', 'Reactivo'])->comment('Tipo');
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
        Schema::dropIfExists('materiales');
    }
}
