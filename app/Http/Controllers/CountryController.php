<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'nombre'=> 'required',
            'abreviatura' => 'required|min:3|max:3'
        ]);
        if ($validator->fails()) {
            return back()->withToastError( $validator->messages()->all()[0])->withInput();
        }
        $country = new Country([

            'nombre'=> $request->get('nombre'),
            'abreviatura' => $request->get('abreviatura')
        ]);

        if (Country::where('nombre', $request->get('nombre'))->exists()) {
            return back()->withToastError($request->get('nombre').' ya esta en los registros!');
        }else{
            $country->save();
            return redirect('/paises')->withToastSuccess('Registro exitoso!');
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
        return redirect('/paises');
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
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required',
            'abreviatura' => 'required|min:3|max:3'
        ]);

        if ($validator->fails()) {
            return back()->withToastError( $validator->messages()->all()[0])->withInput();
        }

        $country = Country::find($id);
        $country->nombre = $request->get('nombre');
        $country->abreviatura = $request->get('abreviatura');
        $country->save();

      return redirect('/paises')->withToastSuccess('Registro Actualizado Exitosamente!');

    }


}
