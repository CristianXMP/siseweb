<?php

use App\Academic_assignment;
use App\Advertisement;
use App\Course;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Support\Facades\Route;



Route::get('/', 'Auth\LoginController@showLoginForm');

Route::post('/', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/homework', function(){
    return view('homework.homework');
});

Route::get('/new-homework', function(){
    return view('homework.new');
});

Auth::routes();

route::get('/prueba', function(){

    $asignacion = Teacher::find(1);


    return $asignacion->academic_assignments;

});






//Route::Auth();

Route::middleware(['auth','role:Teacher'])->group(function(){


    Route::get('/Profesor', 'HomeController@educacion')->name('Profesor');
    //curso y anumcios
    Route::get('/cursoProfesor/{subject_id}', 'HomeController@curso')->name('cursoProfesor');
    Route::get('/anunciosProfesor', 'HomeController@anuncio')->name('anuncios.index');
    Route::post('/PublicarAnuncio', 'AdvertisementsController@publicar')->name('publicar');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');


    route::get('foroprofesor/{subject_id}', 'HomeController@forum')->name('foro.teacher');

    //forums pliblic

    Route::post('/PublicForums/{id}', 'ForumsController@public_forum')->name('public.forums');
    Route::get('/comentLikes/{id}', 'ForumsController@coments_likes')->name('forum.coment');
    Route::post('/PublicComent/{id}', 'ForumsController@public_coment')->name('public.coment');
    Route::get('/likecoment/{id}', 'ForumsController@like_coment')->name('forum.like');



});



Route::middleware(['auth','role:Student'])->group(function(){


    Route::get('/Estudiante', 'HomeController@educacion')->name('Estudiante');
    Route::get('/cursoEstudiante/{subject_id}', 'HomeController@curso')->name('cursoEstudiante');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');


    //foros

    route::get('foroestudiante/{subject_id}', 'HomeController@forum')->name('foro.student');
     Route::get('/comentstudent/{id}', 'ForumsController@coments_likes')->name('forum.comentstudent');
     Route::post('/PublicComentstudent/{id}', 'ForumsController@public_coment')->name('public.comentstudent');
     Route::get('/likecomentstudent/{id}', 'ForumsController@like_coment')->name('forum.likestudent');


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
    Route::get('/restauracion/{id}', 'Auth\RegisterController@restore')->name('restore.user');
    Route::get('/eliminar/{id}', 'Auth\RegisterController@destroy')->name('delete.user');


});

