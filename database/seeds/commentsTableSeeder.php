<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class commentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('comments')->insert([
            'givenby'=>5,
            'thread_id' => 1,
            'parent_id' =>-1,
            'timestamp'=>Carbon::now()->format('Y-m-d H:i:s'),
            'comment'=>"Awesome",
            "comment_id"=>1,
        ]);
    }
    
}
