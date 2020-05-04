<?php

use Illuminate\Database\Seeder;
use App\User;

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
        $this->call(SeederTableSubject::class);
        $this->call(SeederTablePeriod::class);
        $this->call(SeederTableAcademicAssignment::class);

        User::create([
            'name'=>'admin',
            'email' =>'admin@gmail.com',
            'password' =>  Hash::make('123456789')
        ]);




    }
}
