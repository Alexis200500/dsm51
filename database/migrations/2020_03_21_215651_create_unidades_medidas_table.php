<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador');
            $table->string('unidad_medida', 100)->comment('Unidad de medida');
            $table->string('abreviatura', 10)->comment('Abreviatura');
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
        Schema::dropIfExists('unidades_medidas');
    }
}
