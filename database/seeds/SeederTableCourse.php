<?php

use App\Course;
use Illuminate\Database\Seeder;

class SeederTableCourse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Course::class, 5)->create();
    }
}
