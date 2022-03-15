<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriasHasPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorias_has_periodos', function (Blueprint $table) {
            $table->id('id_sub_has_periodo');

            $table->integer('preseleccionado')->default(0);

            $table->unsignedBigInteger('subcategoria_id');

            $table->foreign('subcategoria_id')->references('id_subcategoria')->on('subcategorias');

            $table->unsignedBigInteger('periodo_id');

            $table->foreign('periodo_id')->references('id_periodo')->on('periodos');
            
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
        Schema::dropIfExists('subcategorias_has_periodos');
    }
}
