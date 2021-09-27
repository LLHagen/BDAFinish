<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_vacancy', function (Blueprint $table) {
            $table->unsignedInteger('resume_id');
            $table->unsignedInteger('vacancy_id');
            $table->primary(['resume_id','vacancy_id']);
//            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
//            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_vacancy');
    }
}
