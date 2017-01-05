<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Faker\Factory as Faker;


class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cards')->truncate(); // truncating; so we always work with fresh data.


    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        DB::table('cards')->insert([
            'user_id'        => $faker->numberBetween(1,50),
            'category_id'  => $faker->numberBetween(0,18),
            'front'          => $faker->text($maxNbChars = 200),
            'back'           => $faker->text($maxNbChars = 200),
            'known'          => 0,
            'created_at' => Carbon::now(),
	        ]);
        }
    }
}
