<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 25; $i++) { 
	        DB::table('authors')->insert([
	            'first_name' => Str::random(10),
	            'last_name' => Str::random(10),
	            'middle_name' => Str::random(10),
	            'country' => Str::random(10),
	        ]);
    	}
    }
}
