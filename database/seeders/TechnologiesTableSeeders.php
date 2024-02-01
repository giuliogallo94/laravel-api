<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologiesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['HTML', 'Css', 'JavaScript', 'PHP', 'Python', 'Blazer', 'Vue.JS', 'Laravel'];

        foreach ($technologies as $technologie) {
            $newTechnologie = new Technology();
            $newTechnologie->name = $technologie;
            $newTechnologie->slug = Str::slug($technologie);
            $newTechnologie->hex_color = $faker->hexColor();
            $newTechnologie->description = $faker->text(100);

            $newTechnologie->save();

        }
    }
}
