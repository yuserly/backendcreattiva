<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version_sistemas', function (Blueprint $table) {
            $table->id('id_version');
            $table->string('version');
            $table->unsignedBigInteger('os_id');
            $table->foreign('os_id')->references('id_os')->on('sistema_operativos');
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
        Schema::dropIfExists('version_sistemas');
    }
}
