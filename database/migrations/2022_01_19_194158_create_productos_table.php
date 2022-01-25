<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_key');
            $table->integer('precio');
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id_subcategoria')->on('subcategorias');
            $table->unsignedBigInteger('tipo_producto_id');
            $table->foreign('tipo_producto_id')->references('id_tipo_producto')->on('tipo_productos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
