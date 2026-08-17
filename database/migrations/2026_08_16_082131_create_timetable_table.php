<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offering_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('venue_id');
            $table->string('trimester');
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('class_type');       // L / T / P
            $table->string('class_group')->nullable(); // T1, T2, P1, P2
            $table->string('week_type')->default('every'); // every / odd / even
            $table->boolean('is_locked')->default(false);
            $table->string('status')->default('recommended'); // recommended / confirmed
            $table->timestamps();

            $table->foreign('offering_id')->references('id')->on('course_offerings');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('venue_id')->references('id')->on('venues');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable');
    }
}
