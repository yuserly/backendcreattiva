<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->id('id_subcategoria');
            $table->string('nombre');
            $table->string('slug');
            $table->string('icono');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias');
            $table->integer('preseleccionado');
            $table->integer('visible')->nullable()->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('subcategorias');
    }
}
