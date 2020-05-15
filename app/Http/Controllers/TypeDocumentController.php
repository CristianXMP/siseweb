<?php

namespace App\Http\Controllers;

use App\Type_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeDocumentController extends Controller
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
        $type_documents = Type_document::all();
        return view('tipos_documentos.index', compact('type_documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipos_documentos.create');
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
            'abreviatura' => 'required|min:3|max:3'
        ]);

        if ($validator->fails()) {
            return redirect('/tiposdocumentos/create')->withToastError($validator->messages()->all()[0])->withInput();
        }
        $type_document = new Type_document([

            'nombre' => $request->get('nombre'),
            'abreviatura' => $request->get('abreviatura')
        ]);

        if (Type_document::where('nombre', $request->get('nombre'))->exists()) {



            return back()->withToastError($request->get('nombre') . ' ya esta en los registros!');
        } else {
            $type_document->save();



            return redirect('/tiposdocumentos')->withToastSuccess('Registro exitoso!');
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
        return redirect('/tiposdocumentos');
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

        $typedocument = Type_document::find($id);
        return view('tipos_documentos.edit', compact('typedocument'));

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

        ]);

        $type_document = Type_document::find($id);
        $type_document->nombre = $request->get('nombre');
        $type_document->abreviatura = $request->get('abreviatura');
        $type_document->save();

        return redirect('/tiposdocumentos')->withToastSuccess('Registro Actualizado Correctamente!');
    }


}
