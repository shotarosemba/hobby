<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
   
    public function run()
    {
         DB::table('posts')->insert([
                'title' => 'リボルテックヤマグチエヴァンゲリオン初号機',
                'content' => '今回は新世紀ヱヴァンゲリヲンに登場する初号機のレビューを',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'access_count'=>100,
                'work_id'=>4,
                'user_id'=>1,
                ]);
                
        DB::table('posts')->insert([
                'title' => 'グッドスマイルカンパニー初号機',
                'content' => '今回は新世紀ヱヴァンゲリヲンに登場する初号機のレビューを',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'access_count'=>50,
                'work_id'=>5,
                'user_id'=>1,
                ]);
    }
}
