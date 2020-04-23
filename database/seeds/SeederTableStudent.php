<?php

use App\Student;
use Illuminate\Database\Seeder;

class SeederTableStudent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Student::class, 5)->create();
    }
}
