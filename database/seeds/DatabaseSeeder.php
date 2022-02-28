<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(EreaTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(SpotTableSeeder::class);
        $this->call(CategorySpotTableSeeder::class);
    }
}
