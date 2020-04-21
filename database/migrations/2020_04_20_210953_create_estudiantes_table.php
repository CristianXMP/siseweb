<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('apellidos');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('departament_id');
            $table->unsignedInteger('city_id');
            $table->string('tip_documento');
            $table->string('num_documento');
            $table->date('fecha_exp');
            $table->date('fecha_nacimiento');
            $table->unsignedInteger('curso_id');
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
        Schema::dropIfExists('estudiantes');
    }
}
