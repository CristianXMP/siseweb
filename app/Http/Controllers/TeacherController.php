<?php

namespace App\Http\Controllers;

use App\City;
use App\Teacher;
use App\Type_document;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        return view('teachers.index',  compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type_document =  Type_document::all();
        $city = City::all();
        return view('teachers.create', compact('type_document', 'city'));
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
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'apellidos' => 'required',
            'municipio' => 'required',
            'tipo_de_documento' => 'required',
            'profesion' => 'required',
            'numero_de_documento' => 'required|min:10|max:10',
            'fecha_de_expedicion' => 'required',
            'fecha_de_nacimiento' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $TeacherStore = new Teacher([
            'first_name'       => $request->get('primer_nombre'),
            'second_name'      => $request->get('segundo_nombre'),
            'last_name'        => $request->get('apellidos'),
            'city_id'          => $request->get('municipio'),
            'profession'        => $request->get('profesion'),
            'type_document_id' => $request->get('tipo_de_documento'),
            'number_document'  => $request->get('numero_de_documento'),
            'expedition_date'  => $request->get('fecha_de_expedicion'),
            'birth_date'       => $request->get('fecha_de_nacimiento')
        ]);

        if (Teacher::where('number_document', $request->get('numero_de_documento'))->exists()) {

            return back()->withToastError('El Estudiante ' . $request->get('primer_nombre') . ' Ya Esta En Los Registros!');
        } else {
            $TeacherStore->save();

            return redirect('/profesores')->withToastSuccess('Registro exitoso!');
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

        $TeacherShow = Teacher::find($id);
        return view('teachers.show', compact('TeacherShow'));
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
        $TeacherEdit = Teacher::find($id);
        $TeacherCity = City::all();
        $TeacherTypeDocument = Type_document::all();
        return view('teachers.edit', compact('TeacherEdit', 'TeacherCity', 'TeacherTypeDocument'));
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
            'profesion' => 'required',
            'numero_de_documento' => 'required|min:10|max:10',
            'fecha_de_expedicion' => 'required',
            'fecha_de_nacimiento' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $TeacherUpdate = Teacher::find($id);
        $TeacherUpdate->first_name = $request->get('primer_nombre');
        $TeacherUpdate->second_name      =  $request->get('segundo_nombre');
        $TeacherUpdate->last_name      =  $request->get('apellidos');
        $TeacherUpdate->city_id          =  $request->get('municipio');
        $TeacherUpdate->type_document_id =  $request->get('tipo_de_documento');
        $TeacherUpdate->profession       =  $request->get('profesion');
        $TeacherUpdate->number_document  =  $request->get('numero_de_documento');
        $TeacherUpdate->expedition_date  =  $request->get('fecha_de_expedicion');
        $TeacherUpdate->birth_date      =  $request->get('fecha_de_nacimiento');
        $TeacherUpdate->save();

        return redirect('/profesores')->withToastSuccess('Registro Actualizado Correcatamente!');
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
        $Teacher = Teacher::find($id);
        $Teacher->delete();

        return redirect('/profesores')->withToastSuccess('Registro Eliminado Correcatamente!');
    }
}
