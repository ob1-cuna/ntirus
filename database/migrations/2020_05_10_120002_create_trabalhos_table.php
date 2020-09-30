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
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('freelancer_id')->unsigned();
            $table->foreign('freelancer_id')->references('id')->on('users');
            $table->enum('tipo', ['Presencial', 'Remoto']);
            $table->enum('nivel', ['Iniciante', 'Intermedio', 'Profissional']);
            $table->float('preco_final', 8, 2)->nullable();
            $table->string('provincia');
            $table->string('distrito');
            $table->date('data_prev');
            $table->date('data_aceite')->nullable();
            $table->date('data_entrega')->nullable();
            $table->enum('status', ['Aberto', 'Em Andamento', 'AguardandoAC', 'Aprovado', 'Recusado', 'Cancelado-C', 'Cancelado-F', 'Pagamento Pendente', 'Finalizado', 'Ocultado'])->default('Aberto');
            $table->timestamps();
        });

        DB::unprepared('
        ALTER TABLE `trabalhos` DROP FOREIGN KEY `trabalhos_user_id_foreign`; 
            ALTER TABLE `trabalhos` ADD CONSTRAINT `trabalhos_id_cliente_foreign` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) 
                ON DELETE SET NULL ON UPDATE SET NULL; 
                
        ALTER TABLE `trabalhos`DROP FOREIGN KEY `trabalhos_id_freelancer_foreign`; 
            ALTER TABLE `trabalhos` ADD CONSTRAINT `trabalhos_id_freelancer_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `users`(`id`) 
                ON DELETE SET NULL ON UPDATE SET NULL;
        ');
    }

    public function down()
    {
        Schema::dropIfExists('trabalhos');
    }
}
