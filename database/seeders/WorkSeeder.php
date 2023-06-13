<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
               
                
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => '命名の心得',
                'maker_id'=>1,
          ]);
                
                
         DB::table('works')->insert([
               
                
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => '新世紀エヴァンゲリオン',
                'maker_id'=>1,       
                ]);
                
                 DB::table('works')->insert([
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'ガンダム',
                'maker_id'=>2,    
                 ]);
                
                  DB::table('works')->insert([
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'シュタインズゲート',
                'maker_id'=>3,    
                ]);
                
                 DB::table('works')->insert([
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => '邪神ちゃんドロップキック',
                'maker_id'=>4,    
                
                
         ]);
    }
}
