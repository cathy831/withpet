<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
           [//'id' => '1',
            'body' => 'お店には連れて入れませんが、屋外で散歩することができます。有料駐車場があります。',
            'spot_id' => '2',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'1',
            ],
           [//'id' => '2',
            'body' => 'お店の裏に海があって見晴らしがいいです。犬連れの人が意外と多いです。',
            'spot_id' => '2',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'2',
            ],
           [//'id' => '3',
            'body' => 'テラス席のみ犬を連れて行けます。カフェとしても食事利用としても行けます。',
            'spot_id' => '3',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'1',
            ],
           [//'id' => '4',
            'body' => '年中かき氷が食べられます。',
            'spot_id' => '3',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'2',
            ],
           [//'id' => '5',
            'body' => '1階と2階に分かれていて、2階席がペット同伴可能です。',
            'spot_id' => '4',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'1',
            ],
           [//'id' => '6',
            'body' => 'リーズナブルで美味しいです。席数は少なめなので予約するのがいいと思います。',
            'spot_id' => '4',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'3',
            ],
           [//'id' => '7',
            'body' => '近くに観覧車があります。犬は乗せられませんが。',
            'spot_id' => '2',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'3',
            ],
           [//'id' => '8',
            'body' => 'ピザもスイーツもめちゃくちゃおいしいです。',
            'spot_id' => '13',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'3',
            ],
           [//'id' => '9',
            'body' => '垂直落下の滑り台があって、犬だけでなく子供もあそべます。',
            'spot_id' => '5',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'3',
            ],
           [//'id' => '10',
            'body' => 'フードコートのようなスタイルで、外の席であればわんちゃんも一緒に行けます。',
            'spot_id' => '18',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            'user_id' =>'2',
            ]
           
        ]);
    }
}
