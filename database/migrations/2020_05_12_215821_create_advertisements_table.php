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
            $table->unsignedInteger('academic_assignment_id');
            $table->foreign('academic_assignment_id')->references('id')->on('academic_assignments');
            $table->string('announced', 255);
            $table->dateTime('datetime')->default(now());
            $table->unsignedInteger('likes')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}
