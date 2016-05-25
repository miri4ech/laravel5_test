<?php
 
use Illuminate\Database\Seeder;
 
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
 
        for ($i = 1; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => 'テスト' . $i,
                'email' => 'test' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}