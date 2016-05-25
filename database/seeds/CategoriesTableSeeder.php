<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => '新卒採用',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => '中途採用',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => '就活セミナー',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => '合同説明会',
            'created_at' => Carbon::now()
        ]);
    }
}
