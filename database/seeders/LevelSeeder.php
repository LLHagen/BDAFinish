<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
<<<<<<< HEAD
            ['name' => 'intern'],
            ['name' => 'junior'],
            ['name' => 'middle'],
            ['name' => 'senior'],
            ['name' => 'na'],
=======
            ['name' => 'Джун'],
            ['name' => 'Мидл'],
            ['name' => 'Синьор'],
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
        ]);
    }
}
