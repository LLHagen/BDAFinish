<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
<<<<<<< HEAD
            ['name' => 'Не рассмотрен'],
            ['name' => 'отказ'],
            ['name' => 'одобрен'],
            ['name' => 'слился'],
=======
            ['name' => 'Ожидает'],
            ['name' => 'Рассмотрен'],
            ['name' => 'Одобрен'],
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
        ]);
    }
}
