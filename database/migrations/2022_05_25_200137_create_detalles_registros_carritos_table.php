<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesRegistrosCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_registros_carritos', function (Blueprint $table) {
            $table->id('id_registros_carritos');

            $table->unsignedBigInteger('carrito_id');

            $table->foreign('carrito_id')->references('id_carrito')->on('registros_carritos');

            $table->unsignedBigInteger('subcategoria_id');

            $table->foreign('subcategoria_id')->references('id_subcategoria')->on('subcategorias');

            $table->unsignedBigInteger('producto_id');

            $table->foreign('producto_id')->references('id_producto')->on('productos');

            $table->string('nombre')->nullable();;

            $table->string('email')->nullable();;

            $table->string('telefono')->nullable();;

            $table->integer('porcentaje_desc')->nullable();;

            $table->string('url')->nullable();;

            $table->string('dominio')->nullable();;

            $table->string('ip_server')->nullable();;

            $table->date('fecha');

            $table->time('hora');

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
        Schema::dropIfExists('detalles_registros_carritos');
    }
}
