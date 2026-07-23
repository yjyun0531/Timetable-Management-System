<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('department_id'); 
            $table->string('course_code');
            $table->string('course_name');
            $table->text('description')->nullable(); 
            $table->string('trimester_offered');
            $table->integer('lecture_hours');
            $table->integer('tutorial_hours');
            $table->integer('practical_hours');
            $table->integer('num_students');
            $table->boolean('is_active'); 
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
        Schema::dropIfExists('courses');
    }
}
