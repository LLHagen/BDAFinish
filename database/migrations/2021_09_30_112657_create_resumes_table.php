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
            $table->text('skills')->nullable();
            $table->text('experience')->nullable();
            $table->text('resume');
            $table->dateTime('interview_date')->nullable();
            $table->integer('level_id')->unsigned()->index();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->integer('status_id')->unsigned()->index()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->integer('vacancy_id')->unsigned()->index();
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->timestamps();
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
