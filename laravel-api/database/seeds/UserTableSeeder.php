<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //New User
    	\App\User::create([
    		'name' 		=> 'Francisco Wallison',
    		'email' 	=> 'franciscowallison@gmail.com',
    		'password' 	=> bcrypt('123456'),
    	]);
    }
}
