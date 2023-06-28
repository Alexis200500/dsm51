<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Llave primaria');
            $table->string('direccion', 100)->comment('Almacena la dirección o área de conomiento, ejemplo: Tecnologías de la información y comunicación');
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
        Schema::dropIfExists('direcciones');
    }
}
