<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFormatoLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_formato_laboratorio', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador');
            $table->unsignedInteger('formato_laboratorio_id')->comment('Formato laboratorio');
            $table->unsignedInteger('material_id')->comment('Material');
            $table->unsignedInteger('unidad_medida_id')->comment('Unidad de medida');
            $table->unsignedInteger('cantidad')->comment('Cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_formato_laboratorio');
    }
}
