<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseraddperfilTrigger extends Migration
{
    
    /*
    
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `UserAddPerfilTrigger` AFTER INSERT ON `users`
        FOR EACH ROW begin
            insert into segundapp.perfils (user_id) values (new.id);
        END
        ');
    }

    
    public function down()
    {
        DB::unprepared('DROP TRIGGER `UserAddPerfilTrigger`');
    }
    */
}
