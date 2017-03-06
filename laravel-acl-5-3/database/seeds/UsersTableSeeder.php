<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios
        DB::table('users')->insert([
            'id'            =>  '1',
            'name' 			=> 	'usert1',
            'email' 		=> 	'franciscoWallison@gmail.com',
            'password' 		=> 	bcrypt('acl123')
        ]);
        
        DB::table('users')->insert([
            'id'            =>  '2',
            'name' 			=> 	'usert2',
            'email' 		=> 	'franciscoWallison-2@gmail.com',
            'password'      =>  bcrypt('acl123')
        ]);

         DB::table('users')->insert([
            'id'            =>  '3',
            'name'          =>  'usert3',
            'email'         =>  'franciscoWallison-3@gmail.com',
            'password'      =>  bcrypt('acl123')
        ]);
    }
}
