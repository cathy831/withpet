<?php

use Illuminate\Database\Seeder;

class CategorySpotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_spot')->insert([
           ['category_id' => '4',
            'spot_id' => '1'],
           ['category_id' => '4',
            'spot_id' => '2'],
           ['category_id' => '1',
            'spot_id' => '3'],
           ['category_id' => '2',
            'spot_id' => '4'],
           ['category_id' => '4',
            'spot_id' => '5'],
           ['category_id' => '2',
            'spot_id' => '6'],
           ['category_id' => '4',
            'spot_id' => '7'],
           ['category_id' => '2',
            'spot_id' => '8'],
           ['category_id' => '2',
            'spot_id' => '9'],
           ['category_id' => '2',
            'spot_id' => '10'],
           ['category_id' => '2',
            'spot_id' => '11'],
           ['category_id' => '2',
            'spot_id' => '12'],
           ['category_id' => '4',
            'spot_id' => '13'],
           ['category_id' => '2',
            'spot_id' => '14'],
           ['category_id' => '2',
            'spot_id' => '15'],
           ['category_id' => '2',
            'spot_id' => '16'],
           ['category_id' => '2',
            'spot_id' => '17'],
           ['category_id' => '2',
            'spot_id' => '18'],
           ['category_id' => '2',
            'spot_id' => '19'],
        ]);
    }
}
