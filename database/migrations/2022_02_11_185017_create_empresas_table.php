<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id_empresa');
            $table->string('nombre');
            $table->integer('tipo')->nullable();
            $table->string('rut')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email_empresa')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('giro')->nullable();
            $table->string('direccion')->nullable();
            $table->string('pais')->nullable();
            $table->integer('region')->nullable();
            $table->integer('comuna')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('empresas');
    }
}
