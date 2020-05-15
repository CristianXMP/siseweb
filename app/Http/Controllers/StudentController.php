<?php

namespace App\Http\Controllers;

use App\City;
use App\Course;
use App\Student;
use App\Type_document;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
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
        //Alert::success('Success Title', 'Success Message');

        $students = Student::all();


        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type_document = Type_document::all();
        $city = City::all();
        $course = Course::all();
        return view('students.create', compact('type_document', 'city', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'apellidos' => 'required',
            'municipio' => 'required',
            'tipo_de_documento' => 'required',
            'numero_de_documento' => 'required|min:10|max:10|unique:students,number_document',
            'curso' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $student = new Student([
            'first_name'       => $request->get('primer_nombre'),
            'second_name'      => $request->get('segundo_nombre'),
            'last_name'        => $request->get('apellidos'),
            'city_id'          => $request->get('municipio'),
            'document_type_id' => $request->get('tipo_de_documento'),
            'number_document'  => $request->get('numero_de_documento'),
            'expedition_date'  => $request->get('fecha_de_expedicion'),
            'birth_date'       => $request->get('fecha_de_nacimiento'),
            'course_id'        => $request->get('curso'),
        ]);
            $student->save();

            return redirect('/estudiantes')->withToastSuccess('Registro exitoso!');

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
        $student  = Student::find($id);

        return view('students.show', compact('student'));
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
        $student = Student::find($id);
        $type_document = Type_document::all();
        $city = City::all();
        $course = Course::all();

        return view('students.edit', compact('student', 'type_document', 'city', 'course'));
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
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'apellidos' => 'required',
            'municipio' => 'required',
            'tipo_de_documento' => 'required',
            'numero_de_documento' => 'required|min:10|max:10',
            'curso' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $studentUpdate = Student::find($id);
        $studentUpdate->first_name = $request->get('primer_nombre');
        $studentUpdate->second_name      =  $request->get('segundo_nombre');
        $studentUpdate->last_name      =  $request->get('apellidos');
        $studentUpdate->city_id          =  $request->get('municipio');
        $studentUpdate->document_type_id =  $request->get('tipo_de_documento');
        $studentUpdate->number_document  =  $request->get('numero_de_documento');
        $studentUpdate->expedition_date  =  $request->get('fecha_de_expedicion');
        $studentUpdate->birth_date      =  $request->get('fecha_de_nacimiento');
        $studentUpdate->course_id       =  $request->get('curso');
        $studentUpdate->save();

        return redirect('/estudiantes')->withToastSuccess('Registro Actualizado Correcatamente!');
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
        $student = Student::find($id);
        $student->delete();

        return redirect('/estudiantes')->withToastSuccess('Registro Eliminado Correcatamente!');
    }
}
