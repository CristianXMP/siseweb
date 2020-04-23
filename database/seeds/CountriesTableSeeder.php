<?php

use Illuminate\Database\Seeder;
use App\country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(country::class, 5)->create();
    }
}
