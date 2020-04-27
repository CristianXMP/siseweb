<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_assignments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('period_id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('teacher_id');
            $table->timestamps();

            //relaciones entre las tablas de las llaves foraneas

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_assignments');
    }
}
