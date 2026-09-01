<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('offering_id');
            $table->string('class_group');
            $table->unique(['lecturer_id', 'offering_id', 'class_group']);

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('offering_id')->references('id')->on('course_offerings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_courses');
    }
}
