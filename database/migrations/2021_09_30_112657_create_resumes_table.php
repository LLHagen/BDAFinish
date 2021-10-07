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
        $table->text('text');
        $table->date('interview_date')->nullable();
        $table->unsignedInteger('level_id')->nullable();
        $table->unsignedInteger('vacancy_id')->nullable();
        $table->unsignedInteger('status_id')->default(1)->nullable();
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
