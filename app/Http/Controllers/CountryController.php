<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country = Country::all();
        return view('paises.index', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paises.create');
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
            'abreviatura' => 'required|min:3|max:3'
        ]);
        $country = new Country([

            'nombre'=> $request->get('nombre'),
            'abreviatura' => $request->get('abreviatura')
        ]);

        if (Country::where('nombre', $request->get('nombre'))->exists()) {
            return redirect('/paises/create')->with('danger', 'El pais '.$request->get('nombre'). ' ya existe en los registors');
         }else{
            $country->save();
            return redirect('/paises')->with('success', 'Pais Guardado');
         }


        //

      //
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

        $country = Country::find($id);
        return view('paises.edit', compact('country'));
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
        $request->validate([
            'nombre' =>'required',
            'abreviatura' => 'required|min:3|max:3'

        ]);
        $country = Country::find($id);
        $country->nombre = $request->get('nombre');
        $country->abreviatura = $request->get('abreviatura');
        $country->save();

       return redirect('/paises')->with('success', 'Datos Actualizados');

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

        $country = Country::find($id);
        $country->delete();

        return redirect('/paises')->with('success', 'Dato eliminado');

    }
}
