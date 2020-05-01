<?php

use App\Academic_assignment;
use App\Course;
use App\Teacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function(){
    return view('auth.login');
});


Route::get('/educacion', function(){
    return view('courses_home.dashboardCourses');    
});

Route::get('/educacion/curso/', function(){
    return view('courses_home.course');
});

Route::get('/pruebas', function(){

    $asig = Teacher::findOrFail(2);
    return $asig->Academic_assignments;


   /* $pais = App\country::findOrFail(11);
    return $pais->departaments;

    $deparpais = App\Departament::findOrFail(1);

    return $deparpais->pais;

   $departament = App\Departament::findOrFail(1);

    return $departament->cities;
     ()->create([
        'nombre' => 'atlantico'

    ]);*/


    /*$departament = App\Departament::findOrFail(2);
    return $departament->Pais;*/
});


Route::resource('/periodos', 'PeriodoController');
Route::resource('/estudiantes', 'StudentController');
Route::resource('/paises', 'CountryController');
Route::resource('/departamentos', 'DepartamentController');
Route::resource('/municipios', 'MunicipalityController');
Route::resource('/tiposdocumentos', 'TypeDocumentController');
Route::resource('/profesores', 'TeacherController');
Route::resource('/cursos', 'CourseController');
Route::resource('/asignaciones', 'AcademicAssignmentController');
Route::resource('/materias', 'SubjectController');
