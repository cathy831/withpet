<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           // 'id' => '1',
           ['category_name' => 'カフェ',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           // 'id' => '2',
           ['category_name' => '食事',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           // 'id' => '3',
           ['category_name' => 'ショッピング',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           // 'id' => '4',
           ['category_name' => 'ドッグラン',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           // 'id' => '5',
           ['category_name' => 'テラス席',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           // 'id' => '6',
           ['category_name' => '屋内',
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
        ]);
    }
}
