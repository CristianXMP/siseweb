<?php

use App\Academic_assignment;
use Illuminate\Database\Seeder;

class SeederAcademicAssignmentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Academic_assignment::class, 5)->create();
    }
}
