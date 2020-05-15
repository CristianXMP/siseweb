<?php

use App\Academic_assignment;
use App\Advertisement;
use App\Course;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Support\Facades\Route;



Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::post('/', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('/educacion', function(){
    return view('courses_home.dashboardCourses');
});

Route::get('/educacion/curso/', function(){
    return view('courses_home.course');
});

route::get('/prueba', function(){

    $asignacion = Teacher::find(1);


    return $asignacion->academic_assignments;

});






//Route::Auth();

Route::middleware(['auth','role:Teacher'])->group(function(){


    Route::get('/Profesor', 'HomeController@educacion')->name('Profesor');
    Route::get('/cursoProfesor/{subject_id}', 'HomeController@curso')->name('cursoProfesor');
    Route::get('/anunciosProfesor', 'HomeController@anuncio')->name('anunciosProfesor');
    Route::post('/PublicarAnuncio', 'AdvertisementsController@publicar')->name('publicar');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');



});



Route::middleware(['auth','role:Student'])->group(function(){


    Route::get('/Estudiante', 'HomeController@educacion')->name('Estudiante');
    Route::get('/cursoEstudiante/{subject_id}', 'HomeController@curso')->name('cursoEstudiante');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');


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


    Route::get('/register', 'Auth\RegisterController@index')->name('register');
    Route::get('/create', 'Auth\RegisterController@create')->name('create');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');


});

