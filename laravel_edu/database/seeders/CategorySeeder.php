<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // php artisan db:seed --class=CategorySeeder
    public function run()
    {
        DB::table('categories')->insert([
            ['no' => '0', 'name' => '카테고리0']
            ,['no' => '1', 'name' => '카테고리1']
            ,['no' => '2', 'name' => '카테고리2']
            ,['no' => '3', 'name' => '카테고리3']
            ,['no' => '4', 'name' => '카테고리4']
            ,['no' => '5', 'name' => '카테고리5']
            ,['no' => '6', 'name' => '카테고리6']
            ,['no' => '7', 'name' => '카테고리7']
            ,['no' => '8', 'name' => '카테고리8']
            ,['no' => '9', 'name' => '카테고리9']
        ]);
    }
}
