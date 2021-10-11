<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();;
<<<<<<< HEAD
            $table->string('description');
//            $table->boolean('isActive')->default(true);
=======
            $table->string('description')->nullable();
            $table->boolean("isActive");
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
