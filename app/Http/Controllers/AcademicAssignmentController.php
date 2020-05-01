<?php

namespace App\Http\Controllers;

use App\Academic_assignment;
use App\Course;
use App\Period;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AcademicAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicAssignment = Academic_assignment::all();
        return view('academic_assignments.index', compact('academicAssignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::all();
        $period = Period::all();
        $course = Course::all();
        $subject = Subject::all();
        return view('academic_assignments.create', compact('teacher','period','course','subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'curso' => 'required',
            'profesor' => 'required',
            'periodo' => 'required',
            'materia' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }
        $academicAssignment = new Academic_assignment([

            'course_id' => $request->get('curso'),
            'teacher_id' => $request->get('profesor'),
            'period_id' => $request->get('periodo'),
            'subject_id' => $request->get('materia')
        ]);


            $academicAssignment->save();
            return redirect('/asignaciones')->withToastSuccess('Asignacion Academica  Exitosa!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignacion = Academic_assignment::find($id);
        $teacher = Teacher::all();
        $period = Period::all();
        $course = Course::all();
        $subject = Subject::all();
        return view('academic_assignments.edit', compact('asignacion','teacher','period','course','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'curso' => 'required',
            'profesor' => 'required',
            'periodo' => 'required',
            'materia' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $AsignacionUpdate = Academic_assignment::find($id);

        $AsignacionUpdate->course_id = $request->get('curso');
        $AsignacionUpdate->teacher_id = $request->get('profesor');
        $AsignacionUpdate->period_id = $request->get('periodo');
        $AsignacionUpdate->subject_id = $request->get('materia');

        $AsignacionUpdate->save();

        return redirect('/asignaciones')->withToastSuccess('Asignacion Actualizada Correcatamente!');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $asignacion = Academic_assignment::find($id);
        $asignacion->delete();

        return redirect('/asignaciones')->withToastSuccess('Asignacion Eliminada Correcatamente!');
    }
}
