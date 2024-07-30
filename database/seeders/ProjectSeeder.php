<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for($i =0;$i <20;$i++){

            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->slug = Str::of($project->title)->slug();
            $project->creation_date = $faker->date();
            $project->size = $faker->randomFloat(2, 20 , 1000);
            $project->save();
        }
    }
}
