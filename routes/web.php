<?php

use App\Academic_assignment;
use App\Advertisement;
use App\Course;
use App\FinalScore;
use App\Forum;
use App\ForumParticipant;
use App\HomeworkParticipant;
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

Route::get('test', function(){

   $student = Student::findorfail(2);
   $notas =  Finalscore::where('student_id', $student->id)->get();




   return view('test', compact('notas','student'));
});



route::get('/prueba', function(){

  $participants = HomeworkParticipant::where('job_id', 1)->get();


    //saber que taras pertenencen a la carga academica con id 1
    $car = Academic_assignment::find(1);

   return $car->Homeworks;
 //saber que carga academica pertenencen a la tarea  con id 2
   $job = Job::find(2);

   return $job->Academic_assignment;




});






//Route::Auth();

Route::middleware(['auth','role:Teacher'])->group(function(){


    Route::get('/Miscursos', 'HomeController@educacion')->name('Miscursos');
    //curso y anumcios
    Route::get('/cursoProfesor/{id}', 'HomeController@curso')->name('cursoProfesor');
    Route::get('/anunciosProfesor', 'HomeController@anuncio')->name('anuncios.index');
    Route::post('/PublicarAnuncio/{id}', 'AdvertisementsController@publicar')->name('publicar');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');




    //forums pliblic

    route::get('foroprofesor/{id}', 'ForumsController@forum')->name('foro.teacher');
    Route::post('/PublicForums/{id}', 'ForumsController@public_forum')->name('public.forums');
    Route::get('/comentLikes/{id}', 'ForumsController@coments_likes')->name('forum.coment');
    Route::post('/PublicComent/{id}', 'ForumsController@public_coment')->name('public.coment');
    Route::get('/likecoment/{id}', 'ForumsController@like_coment')->name('forum.like');
    Route::get('/participants/{id}', 'ForumsController@participants')->name('forum.participant');
    Route::post('/qualification/{id}','ForumsController@sendqualification')->name('forum.qualification');
    Route::post('modified-qualify-forum/{id}', 'ForumsController@modified_qualify')->name('modified.qualify.forum');


    /**
     * modulo de tareas
     */

     Route::get('homework','HomeWork@index')->name('homework');
     Route::get('/new-homework', function(){
        return view('homework.new');
    })->name('new.homework');

    Route::post('PublicHomework/{id}','HomeWork@PublicHomework')->name('PublicHomework');
    Route::get('detail-homework/{id}', 'HomeWork@detail_homework')->name('detail.homework');
    Route::get('download-file/{id}', 'HomeWork@download_resource')->name('download.file');
    Route::get('qualify-homework/{id}', 'HomeWork@qualify_homework')->name('qualify.homework');
    Route::get('download-student/{id}', 'HomeWork@download_student')
    ->name('download.student');
    Route::post('send-qualify/{id}', 'HomeWork@SendQualify')
    ->name('send.qualify');

    Route::post('modified-qualify/{id}', 'HomeWork@modified_qualify')
    ->name('modified.qualify');
    Route::get('homework-edit/{id}','HomeWork@edit')
    ->name('homework.edit');
    Route::post('homework-update/{id}', 'HomeWork@update')
    ->name('homework.update');
});



Route::middleware(['auth','role:Student'])->group(function(){


    Route::get('/Mismaterias', 'HomeController@educacion')->name('Mismaterias');
    Route::get('/cursoEstudiante/{id}', 'HomeController@curso')->name('cursoEstudiante');
    Route::get('/likes/{like}', 'AdvertisementsController@likes')->name('likes');


    //foros

    route::get('foroestudiante/{id}', 'ForumsController@forum')->name('foro.student');
     Route::get('/comentstudent/{id}', 'ForumsController@coments_likes')->name('forum.comentstudent');
     Route::post('/PublicComentstudent/{id}', 'ForumsController@public_coment')->name('public.comentstudent');
     Route::get('/likecomentstudent/{id}', 'ForumsController@like_coment')->name('forum.likestudent');

     //tareas

     Route::get('homework-list','HomeWork@index')
     ->name('homework-list');
     Route::get('homework-student/{id}', 'HomeWork@detail_homework')
     ->name('homework-student');
     Route::get('download-homework/{id}', 'HomeWork@download_resource')
     ->name('download.homework');
     Route::post('upload-homework/{id}', 'HomeWork@upload_homework')
     ->name('upload.homework');



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


    Route::get('/users', 'Auth\RegisterController@index')->name('users');
    Route::get('/create', 'Auth\RegisterController@create')->name('create');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');
    Route::get('/restauracion/{id}', 'Auth\RegisterController@restore')->name('restore.user');
    Route::get('/eliminar/{id}', 'Auth\RegisterController@destroy')->name('delete.user');


});

