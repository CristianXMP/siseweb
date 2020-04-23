<?php

namespace App\Http\Controllers;

use App\Type_document;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipos_documentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_document  $type_document
     * @return \Illuminate\Http\Response
     */
    public function show(Type_document $type_document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_document  $type_document
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_document $type_document)
    {
        return view('tipos_documentos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_document  $type_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_document $type_document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_document  $type_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_document $type_document)
    {
        //
    }
}
