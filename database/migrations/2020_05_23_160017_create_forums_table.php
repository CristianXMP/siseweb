<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('academic_assignment_id');
            $table->foreign('academic_assignment_id')->references('id')->on('academic_assignments');
            $table->string('title', 100);
            $table->string('content',400);
            $table->unsignedInteger('lkikecount');
            $table->unsignedInteger('comentcount');
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
        Schema::dropIfExists('forums');
    }
}
