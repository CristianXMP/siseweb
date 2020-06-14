<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomeWork extends Controller
{
    public function index()
    {
        return view('homework.homework');
    }

    public function PublicHomework(Request $request, $id){

        $validator = validator::make(
            $request->all(),
            [
                'title' => 'required|max:80',
                'description' => 'required|max:500',
                'deliverdate' => 'required|date',
                'resource.*' => 'mimes:docx,pdf,xls|min:3000'
            ],
            [
                'title.required' => 'El campo titulo es obligatorio.',
                'description.required' => 'Por favor ingrese una descripcion de la tarea.',
                'deliverdate.required' => 'por favor ingrese la fecha de entrega de la tareas'

            ]
        );
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        if ($request->file('resource')) {
          dd($request->file('resource')->store('homeworks')) ;
           return "archivo guardado";
        }else{
            return "no hay guia";
        }


    }
}
