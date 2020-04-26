<?php

namespace App\Http\Controllers;

use App\City;
use App\Departament;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('municipios.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departament = Departament::all();
        return view('municipios.create', compact('departament'));
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
            'abreviatura' => 'required|min:3|max:3',
            'departamento' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError( $validator->messages()->all()[0])->withInput();
        }

        $citystore = new City([
            'nombre' => $request->get('nombre'),
            'abreviatura' => $request->get('abreviatura'),
            'departament_id' => $request->get('departamento')
        ]);

        if (City::where('nombre', $request->get('nombre'))->exists()) {

            return back()->withToastError($request->get('nombre').' ya esta en los registros!');
        }else{
            $citystore->save();
            return redirect('/municipios')->withToastSuccess('Registro exitoso!');

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
        return redirect('/municipios');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $departament = Departament::all();
        return view('municipios.edit', compact('city', 'departament'));
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
            'abreviatura' => 'required|min:3|max:3',
            'departamento' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError( $validator->messages()->all()[0])->withInput();
        }

        $cityUpdate = city::find($id);
        $cityUpdate->nombre = $request->get('nombre');
        $cityUpdate->abreviatura = $request->get('abreviatura');
        $cityUpdate->departament_id = $request->get('departamento');
        $cityUpdate->save();

        return redirect('/municipios')->withToastSuccess('Registro Actualizado Correcatamente!');

    }


}
