<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        DB::table('roles')->insert([
            'id'            =>  '1',
            'name' 			=> 	'manager',
            'label' 		=> 	'Manager',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('roles')->insert([
            'id'            =>  '2',
            'name' 			=> 	'editor',
            'label' 		=> 	'Editor do Sistema',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('roles')->insert([
            'id'            =>  '3',
            'name' 			=> 	'adm',
            'label' 		=> 	'Administrador do Sistema',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);

        //role_user
        DB::table('role_user')->insert([
            'id'            =>  '1',            
            'role_id'       =>  '3',//adm
            'user_id'       =>  '1',//usert1
        ]);
        DB::table('role_user')->insert([
            'id'            =>  '2',            
            'role_id'       =>  '1',//manager
            'user_id'       =>  '1',//usert1
        ]);
        DB::table('role_user')->insert([
            'id'            =>  '3',            
            'role_id'       =>  '2',//editor
            'user_id'       =>  '2',//usert2
        ]);
        DB::table('role_user')->insert([
            'id'            =>  '4',            
            'role_id'       =>  '1',//manager
            'user_id'       =>  '3',//usert3
        ]);

    }
}
