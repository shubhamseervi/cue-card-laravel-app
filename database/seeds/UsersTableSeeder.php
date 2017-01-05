<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate(); // truncating; so we always work with fresh data.

      DB::table('users')->insert([
          'name' => 'shubham seervi',
          'email' => 'shubhamseervi@cue.app',
          'password' => bcrypt('password'),
      ]);                                    // one default account.

    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	        ]);
        }
    }
}
