<?php

use App\Academic_assignment;
use App\Course;
use App\Teacher;
use Illuminate\Support\Facades\Route;



Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::post('/', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');



/*Route::get('/educacion', function(){
    return view('courses_home.dashboardCourses');
});

Route::get('/educacion/curso/', function(){
    return view('courses_home.course');
});

Route::get('/prueba', function(){


    $teacherc = Academic_assignment::find(1);

    return $teacherc->teacher->fir;

});

*/



//Route::Auth();

Route::middleware(['auth','role:Teacher'])->group(function(){


    Route::get('/Profesor', 'HomeController@Teacher')->name('Profesor');



});



Route::middleware(['auth','role:Student'])->group(function(){


    Route::get('/Estudiante', 'HomeController@Student')->name('Estudiante');



});



Route::middleware(['auth','role:Admin'])->group(function(){

    Route::get('/home', 'HomeController@Admin')->name('Admin');
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

    Route::get('/register', 'Auth\RegisterController@index')->name('register');
    Route::get('/create', 'Auth\RegisterController@create')->name('create');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');


});

