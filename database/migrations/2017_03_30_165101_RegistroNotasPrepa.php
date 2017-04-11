<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistroNotasPrepa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regristroNotasPrepa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idNota')->unsigned();
            $table->foreign('idNota') ->references('id')->on('tipoNotaPrepa');
            $table->string('year')->nullable();
            $table->integer('idPeriodos')->unsigned();
            $table->foreign('idPeriodos') ->references('id')->on('periodos');
            $table->integer('idTipoNota')->unsigned();
            $table->foreign('idTipoNota') ->references('id')->on('tiponota');
            $table->integer('idEstudiante')->unsigned();
            $table->foreign('idEstudiante') ->references('id')->on('estudiante');
            $table->integer('idMateriaGrado')->unsigned();
            $table->foreign('idMateriaGrado') ->references('id')->on('materiagrado');
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
        Schema::drop('regristroNotasPrepa');
    }
}