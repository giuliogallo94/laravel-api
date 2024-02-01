<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $project = new Project();
            $project->title = $faker->company();
            $project->link = $faker->url();
            $project->date = $faker->date();
            
            $project->description = $faker->text(150);
            // $project->slug = Str::slug($project->name);
            $project->save();
        }
    }
}
