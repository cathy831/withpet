<?php

use Illuminate\Database\Seeder;

class EreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ereas')->insert([
           [//'id' => '1',
            'erea_name' => '市内',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '2',
            'erea_name' => '堺',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '3',
            'erea_name' => '豊能',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '4',
            'erea_name' => '三島',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '5',
            'erea_name' => '北河内',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '6',
            'erea_name' => '中河内',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           [//'id' => '7',
            'erea_name' => '南河内',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
            [//'id' => '8',
            'erea_name' => '泉北',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
            [//'id' => '9',
            'erea_name' => '泉南',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null]
        ]);
    }
}
