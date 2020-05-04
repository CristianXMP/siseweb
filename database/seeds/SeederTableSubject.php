<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SeederTableSubject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Subject::class, 5)->create();
    }
}
