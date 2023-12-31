<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 10; $i++){

            $project = new Project();

            $project->title = $faker->word();

            $project->description = $faker->paragraph();

            $project->date_of_creation = $faker->dateTimeThisYear();
            
            $project->save();
        }
    }
}
