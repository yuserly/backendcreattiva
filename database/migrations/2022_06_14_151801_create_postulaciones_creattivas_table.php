<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionesCreattivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones_creattivas', function (Blueprint $table) {
            
            $table->id('id');

            $table->string('nombre');

            $table->string('telefono');

            $table->string('email');

            $table->string('cargo');

            $table->string('ip');

            $table->string('pdf')->nullable();
            
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
        Schema::dropIfExists('postulaciones_creattivas');
    }
}
