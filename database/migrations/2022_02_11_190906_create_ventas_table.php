<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->string('codigo');
            $table->string('glosa');
            $table->integer('neto');
            $table->integer('iva');
            $table->integer('total_peso')->nullable()->default(0);
            $table->float('total_usd')->nullable()->default(0);
            $table->integer('precio_usd')->nullable()->default(0);
            $table->integer('precio_uf')->nullable()->default(0);
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id_servicio')->on('servicios');
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id_estado')->on('estados');
            $table->integer('estado_facturacion')->default(0);
            $table->string('metodo_pago');
            $table->date('fecha_pago')->nullable();
            $table->time('hora_pago')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
