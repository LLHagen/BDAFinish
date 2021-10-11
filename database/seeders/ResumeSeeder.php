<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resumes')->insert([
            [
                'FIO' => 'Иванов Иван Иванович',
                'email' => 'igot-smirnov-94@mail.ru',
<<<<<<< HEAD
                'resume' => 'Резюме текст',
                'status_id' => 1,
                'vacancy_id' => 1,
                'level_id' => 1,
                'interview_date' => null,
            ],
            [
                'FIO' => 'Иванов Иван Иванович',
                'email' => 'igot-smirnov-94@mail.ru',
                'resume' => 'Резюме текст',
                'status_id' => 1,
                'vacancy_id' => 1,
                'level_id' => 1,
                'interview_date' => '2021-10-05 17:26',
            ]
        ]);
=======
                'text' => 'Резюме текст',
                'status_id' => 1,
                'level_id' => 1,
                'vacancy_id' => 1,
            ]
        ]);
        DB::table('resumes')->insert([
            [
                'FIO' => 'Петров Петр Петрович',
                'email' => 'igot-smirnov-94@mail.ru',
                'text' => 'Резюме текст',
                'status_id' => 2,
                'level_id' => 1,
                'interview_date' => '2021-10-06',
                'vacancy_id' => 2,
            ],
        ]);

>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
    }
}
