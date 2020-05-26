<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumComentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_coments', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->unsignedInteger('forum_id');
            $table->foreign('forum_id')->references('id')->on('forums');
            $table->string('name_user');
            $table->string('type_user');
            $table->string('coment', 255);
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
        Schema::dropIfExists('forum_coments');
    }
}
