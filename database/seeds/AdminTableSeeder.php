<?php
 
use Illuminate\Database\Seeder;
 
class AdminTableSeeder extends Seeder
{
 
    public function run()
    {
        DB::table('admins')->truncate();
 
        // for ($i = 1; $i < 100; $i++) {
        //     DB::table('admins')->insert([
        //         'name' => 'テスト' . $i,
        //         'email' => 'admin' . $i . '@example.com',
        //         'password' => bcrypt('password'),
        //     ]);
        // }
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'miri',
        ]);
    }
}