<?php

use App\Period;
use Illuminate\Database\Seeder;

class SeederTablePeriod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Period::class, 1)->create();
    }
}
