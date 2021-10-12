<?php

namespace Database\Seeders;

use App\Http\Controllers\VacanciesController;
use App\Models\Level;
use Illuminate\Database\Seeder;

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
            LevelSeeder::class,
            StatusSeeder::class,
            VacancySeeder::class,
            ResumeSeeder::class
        ]);
    }
}
