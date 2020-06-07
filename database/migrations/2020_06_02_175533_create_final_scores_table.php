<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_scores', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('academic_assignment_id');
            $table->foreign('academic_assignment_id')->references('id')->on('academic_assignments');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('forum_id')->nullable();
            $table->foreign('forum_id')->references('id')->on('forums');

            $table->unsignedInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');

            $table->unsignedInteger('test_id')->nullable();
            $table->foreign('test_id')->references('id')->on('tests');

            $table->dateTime('date_qualification')->default(now());

            $table->float('qualification');

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
        Schema::dropIfExists('final_scores');
    }
}
