<?php

namespace App\Http\Controllers;

use App\Course;
use App\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
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
        //
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $DirectGroup = Teacher::all();
        return view('courses.create', compact('DirectGroup'));
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

            'curso' => 'numeric|required|min:1|max:11|unique:courses,course',
            'abreviatura' => 'required|min:1|max:3',
            'jornada' => 'required',
            'director_de_grupo' => 'required'

        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $CourseStore = new Course([

            'course'       => $request->get('curso'),
            'variation'      => $request->get('abreviatura'),
            'working_day'        => $request->get('jornada'),
            'teacher_id'         => $request->get('director_de_grupo')

        ]);

        if (Course::where('course', $request->get('curso'))->exists() and Course::where('variation', $request->get('abreviatura'))->exists()) {


            return back()->withToastError('El curso ' . $request->get('curso') . ' °' . $request->get('abreviatura') . ' Ya Esta En Los Registros!');
        } else {
            $CourseStore->save();

            return redirect('/cursos')->withToastSuccess('Registro exitoso!');
        }
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
        return  redirect('/cursos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $CourseEdit = Course::find($id);
        $Teacher = Teacher::all();
        return view('courses.edit', compact('CourseEdit', 'Teacher'));
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

            'curso' => 'numeric|required|min:1|max:11',
            'abreviatura' => 'required|min:1|max:3',
            'jornada' => 'required',
            'director_de_grupo' => 'required'

        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $CourseUpdate = Course::find($id);

        $CourseUpdate->course        = $request->get('curso');
        $CourseUpdate->variation     = $request->get('abreviatura');
        $CourseUpdate->working_day   = $request->get('jornada');
        $CourseUpdate->teacher_id    = $request->get('director_de_grupo');

        $CourseUpdate->save();

        return redirect('/cursos')->withToastSuccess('Registro Actualizado Correcatamente!');
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
    }
}
