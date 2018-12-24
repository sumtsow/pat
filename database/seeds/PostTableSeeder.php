<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            'id_user' => 2,
            'id_parent' => 0,
            'text' => 'Привет!',
            'visible' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),               
        ]);
        
        DB::table('post')->insert([
            'id_user' => 1,
            'id_parent' => 1,
            'text' => 'Привет',
            'visible' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),               
        ]);
 
        DB::table('post')->insert([
            'id_user' => 2,
            'id_parent' => 0,
            'text' => 'Пока!',
            'visible' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),               
        ]);
    }
}
