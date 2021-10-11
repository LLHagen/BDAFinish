<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancies')->insert([
            [
                'name' => 'PHP Разработчик',
                'description' => 'PHP Разработчик description',
<<<<<<< HEAD
//                'isActive' => true
=======
                'isActive' => true
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
            ],
            [
                'name' => 'Тестировщик',
                'description' => 'Тестировщик description',
<<<<<<< HEAD
//                'isActive' => true
=======
                'isActive' => true
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
            ],
            [
                'name' => 'Верстальщик',
                'description' => 'Верстальщик description',
<<<<<<< HEAD
//                'isActive' => false
=======
                'isActive' => false
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
            ],
        ]);
    }
}
