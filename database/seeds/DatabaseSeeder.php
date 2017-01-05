<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // If artisan command db:seed doesn't work then
      // 1st run composer dump-autoload then try db:seed.


       $this->call(UsersTableSeeder::class);
       $this->call(CardsTableSeeder::class);
       $this->call(CategoryTableSeeder::class);
    }
}
