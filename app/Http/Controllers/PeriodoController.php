<?php

namespace App\Http\Controllers;

use App\Period;
use App\periodo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Period::all();
        return view('periods.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periods.create');
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
            'nombre' => 'required|numeric|min:1|max:5',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }


        $periodo = new period([
            'nombre' => $request->get('nombre'),
            'fecha_inicial' => $request->get('fecha_inicio'),
            'fecha_final' => $request->get('fecha_final')
        ]);

        if (Period::where('nombre', $request->get('nombre'))->exists()) {

            return back()->withToastError('El periodo ' . $request->get('nombre') . ' Ya Esta En Los Registros!');
        } else {
            $periodo->save();

            return redirect('/periodos')->withToastSuccess('Registro exitoso!');

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

        return redirect('/periodos');
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
        $periodo = period::find($id);

        return view('periods.edit', compact('periodo'));
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
            'nombre' => 'required|numeric|min:1|max:5',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }


        $periodo = period::find($id);
        $periodo->nombre = $request->get('nombre');
        $periodo->fecha_inicial = $request->get('fecha_inicio');
        $periodo->fecha_final = $request->get('fecha_final');
        $periodo->save();

        return redirect('/periodos')->withToastSuccess('El periodo se Actualizo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = period::find($id);
        $periodo->delete();

        return redirect('/periodos')->with('success', 'Periodo eliminado');
    }
}
