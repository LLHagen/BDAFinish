<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'PHP Разработчик',
                'email' => 'igor-smirnov-94@mail.ru',
                'password' => '$2y$10$5RKpkURh/tPkTOrU4LVL.OhTt94Q.1oJVMrb7/2hWszg6J7BJTDJG',
            ],
        ]);
    }
}
