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
            $table->bigInteger('trabalho_id')->unsigned();;
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->bigInteger('user_id')->unsigned();;
            $table->foreign('user_id')->references('id')->on('users');
            $table->float('preco_proposta', 8, 2);
            $table->longText('carta');
            $table->dateTime('tempo_exec', 0);
            $table->enum('status', ['Pendente', 'Aceite', 'Recusado'])->default('Pendente');
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
