<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CountriesTableSeeder::class);
        $this->call(SeederTableDepartament::class);
        $this->call(SeederTableCity::class);
        $this->call(SeederTableType_document::class);
        $this->call(SeederTableTeacher::class);
        $this->call(SeederTableCourse::class);
        $this->call(SeederTableStudent::class);
        $this->call(SeederSubjectTable::class);
        $this->call(SeederPeriodTable::class);
        $this->call(SeederAcademicAssignmentTable::class);

        User::create([
            'name'=>'jose',
            'email' =>'jose@gmail.com',
            'password' => 
        ]);




    }
}
