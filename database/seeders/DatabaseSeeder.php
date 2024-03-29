<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use App\Models\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    $this->call([
        ProjectTableSeeder::class,
        TechnologiesTableSeeders::class,
        TypesTableSeeder::class
    ]);
    }
}
