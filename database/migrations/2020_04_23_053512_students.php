<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name', 70);
            $table->string('second_name', 70);
            $table->string('last_name', 70);
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('document_type_id');
            $table->string('number_document', 30);
            $table->date('expedition_date');
            $table->date('birth_date');
            $table->string('student')->default('student');
            $table->boolean('is_user')->default(false);
            $table->unsignedInteger('course_id');
            $table->timestamps();

            //referencia city_id
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            //document_type_id
            $table->foreign('document_type_id')->references('id')->on('type_documents')->onDelete('cascade')->onUpdate('cascade');
          //course_id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('students');
    }
}
