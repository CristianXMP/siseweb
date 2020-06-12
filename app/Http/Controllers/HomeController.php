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
use Mockery\Matcher\Subset;

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


        $countteacher = Teacher::all()->count();
        $countstudent =  Student::all()->count();
        $countsubject = Subject::all()->count();
        $countacademicassignment = Academic_assignment::all()->count();
        $countcourses = Course::all()->count();
        $countuser = User::all()->count();
        return view('home', compact(
            'countteacher',
            'countstudent',
            'countsubject',
            'countacademicassignment',
            'countcourses',
            'countuser'
        ));
    }

    /* public function Teacher(){
        return view('courses_home.dashboardCourses');
    }

    public function Student(){



    }
*/

    public function anuncio()
    {

        return view('courses_home.course');
    }

    public function educacion()
    {

        if (Auth()->user()->type_user == 'Teacher') {
            $teacher = Teacher::find(auth()->user()->teacher_id);
            $cargaacademica = $teacher->academic_assignments;
            return view('courses_home.dashboardCourses', compact('cargaacademica'));
        }

        if (Auth()->user()->type_user == 'Student') {

            //informacion de ralacion estudiante curso
            $student = Student::find(auth()->user()->student_id);
            //informacion de ralacion  curso carga academica
            $CourseStudent = Course::find($student->course_id);
            $materias = $CourseStudent->academic_assignments;
            return view('courses_home.dashboardCourses', compact('materias'));
        }
    }


    public function curso($id)
    {

        if (Auth()->user()->type_user == 'Teacher') {
            // recolecion de datos carga academica
            $CargaAcademica = Academic_assignment::findorfail($id);
            // recolecion de los datos de anuncios
            $anuncios = Subject::findOrfail($CargaAcademica->subject_id)
                ->Advertisements()
                ->orderBy('created_at', 'desc')->paginate(5);

            $info_cargaacademica = [
                'car' => $CargaAcademica,
            ];
            session($info_cargaacademica);
            return  view('courses_home.course', compact('anuncios'));
        }

        if (Auth()->user()->type_user == 'Student') {
            //recopilacion de datos de estudiante
            $student = Student::find(auth()->user()->student_id);
            //informacion de ralacion  curso carga academica

            $AsignacionAcademica = Academic_assignment::findorfail($id);
            $course = Course::find($AsignacionAcademica->course_id);

            $anuncios = Subject::findOrfail($AsignacionAcademica->subject_id)
                ->Advertisements()
                ->orderBy('created_at', 'desc')->paginate(5);

            $cargaacademica = $course->academic_assignments;

            $info_cargaacademica = [
                'car' => $AsignacionAcademica,
            ];
            session($info_cargaacademica);

            return view('courses_home.course', compact('cargaacademica', 'anuncios'));
        }
    }
}
