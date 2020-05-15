<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('subject_id');
            $table->string('announced', 255);
            $table->dateTime('datetime')->default(now());
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();



                //relacion a la tabla curso
                $table->foreign('course_id')->references('id')->on('courses');

                //relacion a la tabla curso
                $table->foreign('teacher_id')->references('id')->on('teachers');

                //relacion a la tabla curso
                $table->foreign('subject_id')->references('id')->on('subjects');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
