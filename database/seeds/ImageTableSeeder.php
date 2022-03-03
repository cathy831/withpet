<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
           ['id' => '1',
            'url' => 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG',
            'review_id' => '1',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '2',
            'url' => 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG',
            'review_id' => '2',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '3',
            'url' => 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG',
            'review_id' => '3',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '4',
            'url' => 'review_image/IMG_8347_Original 2.jpg',
            'review_id' => '4',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '5',
            'url' => 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG',
            'review_id' => '5',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '6',
            'url' => 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG',
            'review_id' => '6',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '7',
            'url' => 'review_image/IMG_2182_jpg.jpg',
            'review_id' => '7',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '8',
            'url' => 'review_image/IMG_0858_jpg.jpg',
            'review_id' => '8',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '9',
            'url' => 'review_image/IMG_2830.JPG',
            'review_id' => '8',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '10',
            'url' => 'review_image/IMG_2127_jpg.jpg',
            'review_id' => '9',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
           ['id' => '11',
            'url' => 'review_image/IMG_2287.jpg',
            'review_id' => '10',
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
            ],
        ]);
    }
}
