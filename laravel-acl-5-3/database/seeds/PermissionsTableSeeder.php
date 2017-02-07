<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        DB::table('permissions')->insert([
            'id'            =>  '1',
            'name' 			=> 	'view_post',
            'label' 		=> 	'Visualiza o Post',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('permissions')->insert([
            'id'            =>  '2',
            'name' 			=> 	'edit_post',
            'label' 		=> 	'Editar o Post',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);
        DB::table('permissions')->insert([
            'id'            =>  '3',
            'name' 			=> 	'delete_post',
            'label' 		=> 	'Deletar o Post',
            'created_at' => '2017-02-7 02:03:02',
            'updated_at' => '2017-02-07 02:33:50',
        ]);

        //permission_role
        DB::table('permission_role')->insert([
            'id'            =>  '1',            
            'permission_id' => 	'1',//view_post
            'role_id' 		=> 	'1',//manager
        ]);
        DB::table('permission_role')->insert([
            'id'            =>  '2',            
            'permission_id' => 	'1',//view_post
            'role_id' 		=> 	'2',//editor
        ]);
        DB::table('permission_role')->insert([
            'id'            =>  '3',            
            'permission_id' => 	'2',//edit_post
            'role_id' 		=> 	'2',//editor
        ]);
    }
}
