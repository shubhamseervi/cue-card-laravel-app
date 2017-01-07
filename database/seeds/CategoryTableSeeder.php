<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->truncate(); // truncating; so we always work with fresh data.

      $categoryName = [ 'javascript', 'algorithm', 'css',
                         'php', 'laravel', 'nodejs', 'vuejs',
                         'reactjs', 'angularjs', 'OS', 'CA',
                         'python', 'C', 'C++', 'java', 'sorting',
                         'Array', 'stack', 'queue'];

    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        DB::table('categories')->insert([
            'user_id'        => $faker->numberBetween(1,50),
            'category_name'  => $categoryName[$faker->numberBetween(0,18)],
            'created_at' => Carbon::now(),
	        ]);
        }
    }
}
