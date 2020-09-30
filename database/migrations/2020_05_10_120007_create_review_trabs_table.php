<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTrabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_trabs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_trabalho')->unsigned();
            $table->foreign('id_trabalho')->references('id')->on('trabalhos');
            $table->bigInteger('avaliador_id')->unsigned();
            $table->foreign('avaliador_id')->references('id')->on('users');
            $table->bigInteger('avaliado_id')->unsigned();
            $table->foreign('avaliado_id')->references('id')->on('users');
            $table->tinyInteger('nota');
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('review_trabs');
    }
}
