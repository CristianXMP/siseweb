<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

 Schema::create('courses', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('course');
    $table->char('variation', 2);
    $table->string('working_day', 50);
    $table->unsignedInteger('teacher_id');
    $table->timestamps();
    $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('courses');
    }
}
