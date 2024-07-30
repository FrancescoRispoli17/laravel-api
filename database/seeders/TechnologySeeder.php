<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        $technologies = ['Vue', 'Laravel', 'Bootstrap', 'MySQL', 'Axios', 'PHP', 'Vite'];

        foreach($technologies as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->description = $faker->text();
            $new_technology->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
