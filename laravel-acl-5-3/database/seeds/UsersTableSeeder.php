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
            'name' 			=> 	'Wall',
            'email' 		=> 	'franciscoWallison@gmail.com',
            'password' 		=> 	bcrypt('asd123'),
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        
        DB::table('users')->insert([
            'id'            =>  '2',
            'name' 			=> 	'Wall-2',
            'email' 		=> 	'franciscoWallison-2@gmail.com',
            'password' 		=> 	bcrypt('asd123'),
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
            'created_at' => '2017-02-7 02:13:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
    }
}
