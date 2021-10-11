<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('FIO');
        $table->string('email');
<<<<<<< HEAD
        $table->text('skills')->nullable();
        $table->text('experience')->nullable();
        $table->text('resume')->nullable();
        $table->dateTime('interview_date')->nullable();
        $table->unsignedInteger('level_id')->nullable();
        $table->unsignedInteger('vacancy_id')->nullable();
        $table->unsignedInteger('status_id')->default(1)->nullable();
        $table->timestamps();
=======
        $table->text('text'); // TODO: rename
        $table->date('interview_date')->nullable();
        //$table->unsignedInteger('level_id')->nullable();
        $table->integer('level_id')->unsigned()->index();
        $table->foreign('level_id')->references('id')->on('levels');
        //$table->unsignedInteger('status_id')->default(1)->nullable();
        $table->integer('status_id')->unsigned()->index();
        $table->foreign('status_id')->references('id')->on('statuses');
        $table->integer('vacancy_id')->unsigned()->index();
        $table->foreign('vacancy_id')->references('id')->on('vacancies');
//        $table->timestamps();
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
        Schema::dropIfExists('resumes');
    }
}
