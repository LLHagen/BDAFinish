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
                'isActive' => true
            ],
            [
                'name' => 'Тестировщик',
                'description' => 'Тестировщик description',
                'isActive' => true
            ],
            [
                'name' => 'Верстальщик',
                'description' => 'Верстальщик description',
                'isActive' => false
            ],
        ]);
    }
}
