<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_carritos', function (Blueprint $table) {
            $table->id('id_carrito');
            $table->string('ip_visitante');
            $table->string('sitio')->nullable();;
            $table->integer('cliente_id')->nullable();;
            $table->date('fecha');
            $table->time('hora');
            $table->integer('notificacion');
            $table->integer('status_compra')->nullable();;
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
        Schema::dropIfExists('registros_carritos');
    }
}
