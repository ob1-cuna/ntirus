<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trabalho_id')->unsigned();
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('tipo', ['c2p', 'p2f', 'p2c', 'saque']);
            $table->double('valor', 8, 2);
            $table->bigInteger('metodo_id')->unsigned();
            $table->foreign('metodo_id')->references('id')->on('metodos_de_pagamentos');
            $table->string('codigover');
            $table->string('titular');
            $table->string('destino');
            $table->enum('estado', ['Pendente', 'Concluido', 'Por Confirmar'])->default('Pendente');
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
        Schema::dropIfExists('transacaos');
    }
}
