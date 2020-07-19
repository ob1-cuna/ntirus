<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabalhosTable extends Migration
{

    public function up()
    {
        Schema::create('trabalhos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_trabalho');
            $table->text('descricao');
            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->bigInteger('id_freelancer')->unsigned();
            $table->foreign('id_freelancer')->references('id')->on('users');
            $table->enum('tipo', ['presencial', 'remoto']);
            $table->enum('nivel', ['iniciante', 'intermedio', 'profissional']);
            $table->float('preco_inicial', 8, 2);
            $table->float('preco_final', 8, 2)->nullable();
            $table->string('provincia');
            $table->string('distrito');
            $table->string('bairro')->nullable();
            $table->date('data_prev');
            $table->date('data_entrega')->nullable(); 
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabalhos');
    }
}
