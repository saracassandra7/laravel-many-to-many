<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 70; $i++){
            //estraggo un project random
            $project = Project::inRandomOrder()->first();

            //estraggo un id random da technologies
            $technology_id = Technology::inRandomOrder()->first()->id;

            //inserisco il dato nella tabella ponte
            $project->technologies()->attach($technology_id);
        }
    }
}
