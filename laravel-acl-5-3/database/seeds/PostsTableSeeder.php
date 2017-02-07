<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //posts
        DB::table('posts')->insert([
            'id'            =>  '1',
            'user_id' 			=> 	'1',
            'title' 		=> 	'Teste-1',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('posts')->insert([
            'id'            =>  '2',
            'user_id' 			=> 	'1',
            'title' 		=> 	'Teste-1',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('posts')->insert([
            'id'            =>  '3',
            'user_id' 			=> 	'1',
            'title' 		=> 	'Teste-1',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('posts')->insert([
            'id'            =>  '4',
            'user_id' 			=> 	'1',
            'title' 		=> 	'Teste-1',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);


        DB::table('posts')->insert([
            'id'            =>  '5',
            'user_id' 			=> 	'2',
            'title' 		=> 	'Teste-2',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('posts')->insert([
            'id'            =>  '6',
            'user_id' 			=> 	'2',
            'title' 		=> 	'Teste-2',
            'description' 		=> 	'asda sd asd asd asd asd asd asd as da sdasdasdasdasdasdasd',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
    }
}
