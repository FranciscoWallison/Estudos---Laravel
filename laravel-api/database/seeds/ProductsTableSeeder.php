<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //News Products
        $factory->define(App\User::class, function (Faker\Generator $faker) {
    		static $password;

		    return [
		        'name' => $faker->name,
		        'email' => $faker->unique()->safeEmail,
		        'password' => $password ?: $password = bcrypt('secret'),
		        'remember_token' => str_random(10),
		    ];
		});

    }
}
