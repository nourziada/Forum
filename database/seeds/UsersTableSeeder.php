<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
        	[

        		'name' => 'Admin',
        		'email' => 'admin@admin.com',
        		'avatar' => asset('avatars/original.png'),
        		'password' => bcrypt('password'),
        		'admin' => 1
        	]);

        App\User::create(
            [

                'name' => 'nour ziada',
                'email' => 'eng.nour.ziada@gmail.com',
                'avatar' => asset('avatars/original.png'),
                'password' => bcrypt('password'),
                'admin' => 0
            ]);

    }
}
