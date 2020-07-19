<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_trabalho')->unsigned();;
            $table->foreign('id_trabalho')->references('id')->on('trabalhos');
            $table->bigInteger('id_usuario')->unsigned();;
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->float('preco_proposta', 8, 2);
            $table->dateTime('tempo_exec', 0);
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
        Schema::dropIfExists('propostas');
    }
}
