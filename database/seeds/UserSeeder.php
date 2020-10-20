<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
    }
}
