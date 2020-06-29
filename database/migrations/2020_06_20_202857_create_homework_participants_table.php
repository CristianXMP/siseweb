<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_participants', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('homework',200)->nullable();
            $table->string('description', 150)->nullable();
            $table->boolean('state')->default(false);
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
        Schema::dropIfExists('homework_participants');
    }
}
