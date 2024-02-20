<?php

namespace Database\Seeders;

use App\Models\level;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=File::get(path:'database/json/level.json');

        $types=collect(json_decode($json));

        $types->each(function ($type){
            level::create([
                'level'=>$type->level
            ]);
        });
    }
}
