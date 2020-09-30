<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperEducasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expereducas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();;
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('tipo',['exper_prof', 'educacao']);
            $table->string('instituicao');
            $table->string('nome');
            $table->date('data_inicio');
            $table->date('data_terminio')->default('1900-01-01');
            $table->longText('descricao');
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
        Schema::dropIfExists('expereducas');
    }
}
