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
            'nickname' => 'あい',
            'gender' => 'male',
            'age' => '20',
            'email' => 'aioi@email.com',
            'password' => Hash::make('aioioia'),
            'email_verified_at' => now(),
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           ['id' => '2',
            'name' => '井上',
            'nickname' => 'いう',
            'gender' => 'female',
            'age' => '20',
            'email' => 'iue@email.com',
            'password' => Hash::make('iueui'),
            'email_verified_at' => now(),
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null],
           ['id' => '3',
            'name' => '上野',
            'nickname' => 'うえ',
            'gender' => 'male',
            'age' => '20',
            'email' => 'ueno@email.com',
            'password' => Hash::make('uenoneu'),
            'email_verified_at' => now(),
            'created_at'=>now(),
            'updated_at'=>now(),
            'deleted_at'=>null]
        ]);
        
    }
}
