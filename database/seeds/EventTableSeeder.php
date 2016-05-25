<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'テストのタイトル',
            'body' => '第一回目の投稿だよ！',
            'created_at' => Carbon::now()
        ]);
    }
}
