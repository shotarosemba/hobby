<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('makers')->insert([
             'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => '海洋堂',
               ]);
               
               
        DB::table('makers')->insert([
             'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'バンダイ',
               ]);  
        
        
        DB::table('makers')->insert([
             'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'コトブキヤ',
                ]); 
                
                
        DB::table('makers')->insert([
             'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'グッドスマイルカンパニー',]);     
        DB::table('makers')->insert([
             'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'name' => 'Alter',]);           
    }
}