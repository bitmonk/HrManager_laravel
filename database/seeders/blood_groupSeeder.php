<?php

namespace Database\Seeders;

use App\Models\blood_group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class blood_groupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=File::get(path:'database/json/bloodgroup.json');

        $types=collect(json_decode($json));

        $types->each(function ($type){
            blood_group::create([
                'blood_group'=>$type->blood_group
            ]);
        });
        
    }
}
