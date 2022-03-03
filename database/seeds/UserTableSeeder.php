<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           ['id' => '1',
            'name' => '相生',
            'email' => 'aioi@mail.com',
            'email_verified_at' => null,
            'password' => 'aioioia',
            'remember_token' => null,
            'created_at'=>now(),
            'deleted_at'=>null,
            'nickname' =>'あい',
            'sex' => '女性',
            'age' => '20',
            'updated_at'=>now(),
            ],
           ['id' => '2',
            'name' => '井上',
            'email' => 'iue@mail.com',
            'email_verified_at' => null,
            'password' => 'iueui',
            'remember_token' => null,
            'created_at'=>now(),
            'deleted_at'=>null,
            'nickname' =>'いう',
            'sex' => '男性',
            'age' => '20',
            'updated_at'=>now(),
            ]
        ]);
    }
}
