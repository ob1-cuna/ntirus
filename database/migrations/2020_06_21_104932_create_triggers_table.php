<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared('
       CREATE TRIGGER `UserAddPerfilTrigger` AFTER INSERT ON `users` FOR EACH ROW 
        BEGIN
            INSERT INTO primeirapp.perfils (user_id) values (new.id);
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `UserAddPerfilTrigger`');
    }
}
