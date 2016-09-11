<?php

use Illuminate\Database\Seeder;

class user_websitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_websites')->insert([
            'user_id'=>2,
            'website_name' => str_random(10),
            'website_id' =>2,
        ]);
    }
}
