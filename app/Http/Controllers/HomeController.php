<?php

namespace App\Http\Controllers;

use App\Academic_assignment;
use App\Advertisement;
use App\Advertisements;
use App\Course;
use App\Forum;
use App\likeadvertisement;
use App\Student;
use App\Subject;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Admin()
    {
        return view('home');
    }

   /* public function Teacher(){
        return view('courses_home.dashboardCourses');
    }

    public function Student(){



    }
*/

    public function anuncio(){

        return view('courses_home.course');

    }

    public function educacion()  {

        if (Auth()->user()->type_user == 'Teacher') {



            $teacher_id = auth()->user()->teacher_id;

            $teacher = Teacher::find($teacher_id);

            $cargaacademica = $teacher->academic_assignments;

            return view('courses_home.dashboardCourses', compact('cargaacademica'));




        }

        if (Auth()->user()->type_user == 'Student') {



               //informacion de ralacion estudiante curso
                $student_id = auth()->user()->student_id;
                $student = Student::find($student_id);

            //informacion de ralacion  curso carga academica

                $course_id = $student->course_id;

                $cargaacademica = Course::find($course_id);

                $materias = $cargaacademica->academic_assignments;

            return view('courses_home.dashboardCourses', compact('materias'));


         }
    }


    public function curso($subject_id){

        if (Auth()->user()->type_user == 'Teacher') {

            // recolecion de datos relacionados

            $CargaAcademica = Academic_assignment::where('subject_id', $subject_id )->get();
            $teacher_id = auth()->user()->teacher_id;
            $teacher_info = Teacher::findOrfail($teacher_id);
            $course = Course::findOrfail($CargaAcademica[0]['course_id']);
            $subject = Subject::findOrfail($CargaAcademica[0]['subject_id']);

            //------/-------

            // recolecion de los datos de anuncios

            $anuncios = Subject::findOrfail($subject_id)
            ->Advertisements()
            ->orderBy('created_at', 'desc')->paginate(5);

            return  view('courses_home.course', compact('course','teacher_info','subject','anuncios'));

        }

        if (Auth()->user()->type_user == 'Student') {

                $student_id = auth()->user()->student_id;
                $student = Student::find($student_id);

            //informacion de ralacion  curso carga academica

                $AsignacionAcademica = Academic_assignment::where('subject_id', $subject_id)->get();
                $course = Course::find($AsignacionAcademica[0]['course_id']);
                $teacher_info = Teacher::findorfail($AsignacionAcademica[0]['teacher_id']);
                $subjectInfo = Subject::findOrfail($subject_id);

                $anuncios = Subject::findOrfail($subject_id)
                ->Advertisements()
                ->orderBy('created_at', 'desc')->paginate(5);

                $cargaacademica = $course->academic_assignments;
                $subject = Subject::findorfail($subject_id);

                return view('courses_home.course', compact('cargaacademica','course','teacher_info','anuncios','subject'));


         }

    }


    public function forum($subject_id)
    {

        if (Auth()->user()->type_user == 'Student') {

            $CargaAcademica = Academic_assignment::where('subject_id', $subject_id )->get();
            $teacher_id = $CargaAcademica[0]['teacher_id'];
            $teacher_info = Teacher::findOrfail($teacher_id);
            $course = Course::findOrfail($CargaAcademica[0]['course_id']);
            $subject = Subject::findOrfail($CargaAcademica[0]['subject_id']);
            $forums = Forum::where('academic_assignment_id', $CargaAcademica[0]['id'])->get();
            return view('forum.index', compact('teacher_info','course','subject','forums'));

        }

        if (Auth()->user()->type_user == 'Teacher') {

            $CargaAcademica = Academic_assignment::where('subject_id', $subject_id )->get();
            $teacher_id = $CargaAcademica[0]['teacher_id'];
            $teacher_info = Teacher::findOrfail($teacher_id);
            $course = Course::findOrfail($CargaAcademica[0]['course_id']);
            $subject = Subject::findOrfail($CargaAcademica[0]['subject_id']);
            $forums = Forum::where('academic_assignment_id', $CargaAcademica[0]['id'])->get();

            return view('forum.index', compact('teacher_info','course','subject','forums' ));

        }

    }






}
