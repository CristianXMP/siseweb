<?php

namespace App\Http\Controllers;

use App\country;
use Illuminate\Http\Request;
use App\Departament;
class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departament = Departament::all();

        return view('departamentos.index' , compact('departament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = country::all();
        return view('departamentos.create', compact('countries'));
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

        $request->validate([
            'nombre'=> 'required',
            'abreviatura' => 'required|min:3|max:3',
            'pais' => 'required'
        ]);

      $departament = new Departament([
          'nombre' => $request->get('nombre'),
          'abreviatura' => $request->get('abreviatura'),
          'countries_id' => $request->get(('pais'))
      ]);

            if (Departament::where('nombre', $request->get('nombre'))->exists()) {
                return redirect('/departamentos/create')->with('danger', 'Este Departamento '.$request->get('nombre'). ' ya esta en los registros');
            }else{
                $departament->save();
                return redirect('/departamentos')->with('success', 'Departamento Guardado');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departament = Departament::findOrfail($id);
        $pais = country::all();
        return view('departamentos.edit', compact('departament','pais'));
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
        $request->validate([
            'nombre'=> 'required',
            'abreviatura' => 'required|min:3|max:3',
            'pais' => 'required'
        ]);

        $departament = Departament::find($id);
        $departament->nombre = $request->get('nombre');
        $departament->abreviatura = $request->get('abreviatura');
        $departament->countries_id = $request->get('pais');
        $departament->save();

       return redirect('/departamentos')->with('success', 'Datos Actualizados');




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

        $departament = Departament::find($id);
        $departament->delete();

        return redirect('/departamentos')->with('success', 'Dato eliminado');
    }
}
