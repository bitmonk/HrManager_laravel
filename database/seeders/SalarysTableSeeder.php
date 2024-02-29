<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarysTableSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy data into the 'salarys' table
        DB::table('salarys')->insert([
            ['salary_type' => 'Monthly'],
            ['salary_type' => 'Weekly'],
            ['salary_type' => 'Hourly'],
            // Add as many as you need
        ]);
    }
}