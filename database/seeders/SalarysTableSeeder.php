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
            ['salary_type' => 'Hourly'],
            ['salary_type' => 'Monthly'],
            ['salary_type' => 'Project-Based'],
            // Add as many as you need
        ]);
    }
}