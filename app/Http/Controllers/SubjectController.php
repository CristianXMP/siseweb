<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();
        return view('subjects.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
            'nombre' => 'required',


        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $materia = new Subject([
            'nombre' => $request->get('nombre'),
            'abreviatura' => $request->get('abreviatura')
        ]);

        if (Subject::where('nombre', $request->get('nombre'))->exists()) {

            return back()->withToastError('La materia ' . $request->get('nombre') . ' Ya Esta En Los Registros!');
        } else {
            $materia->save();

            return redirect('/materias')->withToastSuccess('Registro exitoso!');

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

        return redirect('/materias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
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
            'nombre' => 'required',


        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $studentUpdate = Subject::find($id);
        $studentUpdate->nombre = $request->get('nombre');
        $studentUpdate->abreviatura      =  $request->get('abreviatura');
        $studentUpdate->save();
        return redirect('/materias')->withToastSuccess('Registro Actualizado Correctamente!');
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
