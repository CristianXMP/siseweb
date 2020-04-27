<?php

use App\Period;
use Illuminate\Database\Seeder;

class SeederPeriodTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Period::class, 5)->create();
    }
}
