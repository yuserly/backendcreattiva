<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesJumpsellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_jumpsellers', function (Blueprint $table) {

            $table->id('id');

            $table->string('email')->nullable();

            $table->string('tipocliente')->nullable();

            $table->string('nombrecliente')->nullable();

            $table->string('urlweb')->nullable();

            $table->string('rut')->nullable();

            $table->string('telefono')->nullable();

            $table->string('giro')->nullable();

            $table->string('direccion')->nullable();

            $table->string('nombretienda')->nullable();

            $table->integer('idproducto')->nullable();

            $table->integer('idperiodo')->nullable();

            $table->string('ip')->nullable();

            $table->integer('status')->nullable();
            
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
        Schema::dropIfExists('solicitudes_jumpsellers');
    }
}
