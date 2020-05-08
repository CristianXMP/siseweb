<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('cargo')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->string('cedula')->unique();
            $table->timestamp('cedula_verified_at')->nullable();
            $table->string('password');
            $table->string('type_user');
            $table->rememberToken();
            $table->timestamps();

            //relacion a la tabla teacher
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            //relacion a la tabla student
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
