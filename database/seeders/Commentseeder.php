<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Commentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            
        DB::table('comments')->insert([
            'user_id'=>1,
            'content'=>'comment  of userid=2',
            'post_id'=>3,
            'updated_at'=>new DateTime(),
            'created_at'=>new DateTime(),
            
        
        
        ]);
    }
}
