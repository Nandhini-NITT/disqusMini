<?php

use Illuminate\Database\Seeder;

class website_threadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('website_threads')->insert([
       'website_id'=>2,
       ]);
    }
}
