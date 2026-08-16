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
            $table->integer('lecture_hours');
            $table->integer('tutorial_hours');
            $table->integer('practical_hours');
            $table->boolean('is_elective')->default(false);
            $table->integer('required_choices')->nullable();
            $table->integer('elective_pool_size')->nullable();
            $table->string('course_category')->default('normal'); // 'normal' or 'mpu'
            $table->boolean('is_active')->default(true);

            $table->foreign('department_id')->references('id')->on('departments');
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
