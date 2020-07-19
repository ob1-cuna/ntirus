<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagems', function (Blueprint $table) {
            $table->id();
            $table->string('caminho');
            $table->string('nome_anexo')->nullable();
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('nome_tabela');
            $table->bigInteger('id_localizacao')->unsigned();
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
        Schema::dropIfExists('imagems');
    }
}
