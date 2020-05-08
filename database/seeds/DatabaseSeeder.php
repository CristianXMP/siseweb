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

            'nombre' => 'xavier',
            'apellidos' => 'moreno perez',
            'cargo' => '',
            'teacher_id' => null,
            'student_id' => null,
            'cedula'    => '1234567890',
            'cedula_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'type_user' => 'Student',
            'remember_token' => Str::random(10)

        ]);

        User::create([

            'nombre' => 'cristian',
            'apellidos' => 'perez',
            'cargo' => 'rector',
            'teacher_id' => null,
            'student_id' => null,
            'cedula'    => '1193574481',
            'cedula_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'type_user' => 'Admin',
            'remember_token' => Str::random(10)

        ]);


        User::create([

            'nombre' => 'jose',
            'apellidos' => 'andrades',
            'cargo' => 'profesor',
            'teacher_id' => null,
            'student_id' => null,
            'cedula'    => '0987654321',
            'cedula_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'type_user' => 'Teacher',
            'remember_token' => Str::random(10)

        ]);


        //factory(User::class, 7)->create();



    }
}
