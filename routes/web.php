<?php

use App\Academic_assignment;
use App\Advertisement;
use App\Course;
use App\FinalScore;
use App\ForumParticipant;
use App\Job;
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


Route::view('/detail-homework', 'homework.detail');

Route::view('/qualify', 'homework.qualify');

Auth::routes();


route::get('/prueba', function(){


    //saber que taras pertenencen a la carga academica con id 1
    $car = Academic_assignment::find(1);

   return $car->Homeworks;
 //saber que carga academica pertenencen a la tarea  con id 2
   $job = Job::find(2);

   return $job->Academic_assignment;




});






//Route::Auth();

Route::middleware(['auth','role:Teacher'])->group(function(){


    Route::get('/Profesor', 'HomeController@educacion')->name('Profesor');
    //curso y anumcios
    Route::get('/cursoProfesor/{id}', 'HomeController@curso')->name('cursoProfesor');
    Route::get('/anunciosProfesor', 'HomeController@anuncio')->name('anuncios.index');
    Route::post('/PublicarAnuncio', 'AdvertisementsController@publicar')->name('publicar');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');




    //forums pliblic

    route::get('foroprofesor/{id}', 'ForumsController@forum')->name('foro.teacher');
    Route::post('/PublicForums/{id}', 'ForumsController@public_forum')->name('public.forums');
    Route::get('/comentLikes/{id}', 'ForumsController@coments_likes')->name('forum.coment');
    Route::post('/PublicComent/{id}', 'ForumsController@public_coment')->name('public.coment');
    Route::get('/likecoment/{id}', 'ForumsController@like_coment')->name('forum.like');
    Route::get('/participants/{id}', 'ForumsController@participants')->name('forum.participant');
    Route::post('/qualification/{id}','ForumsController@sendqualification')->name('forum.qualification');


    /**
     * modulo de tareas
     */

     Route::get('homework','HomeWork@index')->name('homework');
     Route::get('/new-homework', function(){
        return view('homework.new');
    })->name('new.homework');

    Route::post('PublicHomework/{id}','HomeWork@PublicHomework')->name('PublicHomework');


});



Route::middleware(['auth','role:Student'])->group(function(){


    Route::get('/Estudiante', 'HomeController@educacion')->name('Estudiante');
    Route::get('/cursoEstudiante/{id}', 'HomeController@curso')->name('cursoEstudiante');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');


    //foros

    route::get('foroestudiante/{id}', 'ForumsController@forum')->name('foro.student');
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

