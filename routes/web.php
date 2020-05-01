<?php

use App\Academic_assignment;
use App\Course;
use App\Teacher;
use Illuminate\Support\Facades\Route;








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){

    //rutas periodos
 
    //
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

    Route::resource('usuarios', 'UserController');


});

Route::get('/', 'Auth\LoginController@ShowLoginForm')->name('login');
route::post('/', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
