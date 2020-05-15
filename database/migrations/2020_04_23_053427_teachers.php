<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 70);
            $table->string('second_name', 70);
            $table->string('last_name', 70);
            $table->unsignedInteger('city_id');
            $table->string('profession', 70);
            $table->unsignedInteger('type_document_id');
            $table->string('number_document', 60);
            $table->date('expedition_date')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('techaer')->default('techer');
            $table->boolean('is_user')->default(false);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('type_document_id')->references('id')->on('type_documents')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('teachers');
    }
}
