<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_likes', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->unsignedInteger('forum_id');
            $table->foreign('forum_id')->references('id')->on('forums');

            $table->unsignedInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            
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
        Schema::dropIfExists('forum_likes');
    }
}
