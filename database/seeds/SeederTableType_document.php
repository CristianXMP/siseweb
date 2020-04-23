<?php

use App\Type_document;
use Illuminate\Database\Seeder;

class SeederTableType_document extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Type_document::class, 5)->create();
    }
}
