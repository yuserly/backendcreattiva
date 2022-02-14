<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->string('codigo');
            $table->integer('cantidad');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id_producto')->on('productos');
            $table->unsignedBigInteger('periodo_id');
            $table->foreign('periodo_id')->references('id_periodo')->on('periodos');
            $table->unsignedBigInteger('os_id')->nullable();
            $table->foreign('os_id')->references('id_os')->on('sistema_operativos');
            $table->unsignedBigInteger('version_id')->nullable();
            $table->foreign('version_id')->references('id_version')->on('version_sistemas');
            $table->integer('administrado')->nullable()->default(0);
            $table->string('ip')->nullable();
            $table->string('dominio')->nullable();
            $table->dateTime('fecha_inscripcion');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_renovacion')->nullable();
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id_empresa')->on('empresas');
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id_estado')->on('estados');
            $table->integer('estado_creado')->default(0);

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
        Schema::dropIfExists('servicios');
    }
}
