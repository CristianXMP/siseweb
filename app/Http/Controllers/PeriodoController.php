<?php

namespace App\Http\Controllers;
use App\periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = periodo::all();
       return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');
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
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required'
        ]);

        $perdiodo = new periodo([
            'nombre' => $request->get('nombre'),
            'fecha_inicial' => $request->get('fecha_inicio'),
            'fecha_final' => $request->get('fecha_final')
        ]);
        $perdiodo->save();

        return redirect('/periodos')->with('success','El periodo se agrego');

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
        //
       $periodo = periodo::find($id);

       return view('periodos.edit', compact('periodo'));
      

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
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required'
        ]);


        $periodo = periodo::find($id);
        $periodo->nombre = $request->get('nombre');
        $periodo->fecha_inicial = $request->get('fecha_inicio');
        $periodo->fecha_final = $request->get('fecha_final');
        $periodo->save();

        return redirect('/periodos')->with('success','El periodo se Actualizo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = periodo::find($id);
        $periodo->delete();

        return redirect('/periodos')->with('success', 'Periodo eliminado');
    }
}
