<?php

use Illuminate\Database\Seeder;
use App\Departament;


class SeederTableDepartament extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Departament::class, 5)->create();
    }
}
