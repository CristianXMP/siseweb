<?php

namespace App\Http\Controllers;

use App\Academic_assignment;
use App\FinalScore;
use App\HomeworkParticipant;
use App\Job;
use App\Student;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeWork extends Controller
{
    public function index()
    {

        $homeworks = Job::all();

        foreach ($homeworks as $item) {
            if (strtotime(now()->format('y-m-d')) > strtotime($item->deliver_date)) {
                Job::where('id', $item->id)
                    ->update(['state' => 'Inactiva']);
            }
        }



        // return now()->format('y-m-d'); //in_c('car','id',null);
        $car =  Academic_assignment::findorfail(in_c('car', 'id', null))->homeworks;




        return view('homework.homework', compact('car'));
    }

    public function PublicHomework(Request $request, $id)
    {

        $validator = validator::make(
            $request->all(),
            [
                'title' => 'required|max:80',
                'description' => 'required|max:500',
                'deliverdate' => 'required|date',
                'resource' => 'mimes:docx,XLSX,pdf|max:100'
            ],
            [
                'title.required' => 'El campo titulo es obligatorio.',
                'description.required' => 'Por favor ingrese una descripcion de la tarea.',
                'deliverdate.required' => 'por favor ingrese la fecha de entrega de la tareas',
                'resource.mimes' => "Los recursos solo aceptan archivos word, excel o pdf"

            ]
        );
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }
        $car = Academic_assignment::findorfail($id);
        if ($request->file('resource')) {
            // dd ;

            $NameResource = str_replace(' ', '_', $request->file('resource')->getClientOriginalName());
            Job::create([
                'academic_assignment_id' => $id,
                'title' =>  $request->get('title'),
                'description' => $request->get('description'),
                'deliver_date' => $request->get('deliverdate'),
                'resource' => $car->subject->nombre . '_' . $car->course->course . '_' . $car->course->variation . '_' . $NameResource,


            ]);


            $request->file('resource')->storeAs('homeworks',  $car->subject->nombre . '_' . $car->course->course . '_' . $car->course->variation . '_' . $NameResource);
            return redirect('/homework')->withToastSuccess('tarea publicada');
            // return Storage::download('homeworks/'.$car->subject->nombre.'_'.$car->course->course.'_'.$car->course->variation.'_'.$NameResource);
            //return asset('storege/'.$car->subject->nombre.'_'.$car->course->course.'_'.$car->course->variation.'_'.$NameResource);

        } else {
            Job::create([
                'academic_assignment_id' => $id,
                'title' =>  $request->get('title'),
                'description' => $request->get('description'),
                'deliver_date' => $request->get('deliverdate'),
                'resource' => '',


            ]);


            return redirect('/homework')->withToastSuccess('tarea publicada');
        }
    }

    public function detail_homework($id)
    {
        $homework = Job::findorfail($id);
        $HomeworkCount = FinalScore::where('job_id', $id)->count();
        $homeworksend = FinalScore::where('job_id', $id)
            ->where('student_id', Auth()->user()->student_id)->get();
        $homeworkinfo = HomeworkParticipant::where('student_id', Auth()->user()->student_id)
            ->where('job_id', $id)->get();
        return view('homework.detail', compact('homework', 'HomeworkCount', 'homeworksend', 'homeworkinfo'));
    }

    public function qualify_homework($id)
    {
        $homework = Job::findorfail($id);
        $students = Student::where('course_id', in_c('car', 'course', 'id'))->get();
        $participants = HomeworkParticipant::where('job_id', $id)->where('state', false)->get();
        $calificados = FinalScore::where('job_id', $id)->get();

        return view('homework.qualify', compact('homework', 'participants', 'calificados'));
    }

    public function download_resource($id)
    {

        $file = Job::where('id', $id)->select('resource')->get();

        return Storage::download('homeworks/' . $file[0]['resource']);
    }


    public function upload_homework(request $request, $id)
    {
        $validator = validator::make(
            $request->all(),
            [

                'resource' => 'required|mimes:docx,XLSX,pdf|max:100'
            ],
            [
                'resource.required' => 'Archivo de trabajo obligatorio',
                'resource.mimes' => "Los recursos solo aceptan archivos word, excel o pdf"

            ]
        );
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }
        $student = Student::findorfail(Auth()->user()->student_id);
        if (HomeworkParticipant::where('student_id', $student->id)->where('job_id', $id)->exists()) {
            return back()->withToastError('No puedes subir mas de un archivo.');
        } else {
            if ($request->file('resource')) {
                // dd ;

                $NameResource = str_replace(' ', '_', $request->file('resource')->getClientOriginalName());
                HomeworkParticipant::create([
                    'student_id' => $student->id,
                    'job_id' =>  $id,
                    'homework' => $student->first_name . '_' . $student->course->course . '_' . $NameResource,


                ]);


                $request->file('resource')->storeAs('homeworks', $student->first_name . '_' . $student->course->course . '_' . $NameResource);
                return redirect('/homework-list')->withToastSuccess('Trabajo subido correctamente.');
                // return Storage::download('homeworks/'.$car->subject->nombre.'_'.$car->course->course.'_'.$car->course->variation.'_'.$NameResource);
                //return asset('storege/'.$car->subject->nombre.'_'.$car->course->course.'_'.$car->course->variation.'_'.$NameResource);

            }
        }
    }
    //download file student
    public function download_student($id)
    {
        $data = HomeworkParticipant::find($id);
        return Storage::download('homeworks/' . $data->homework);
    }


    public function SendQualify(request $request, $id)
    {
        $JobStudent = HomeworkParticipant::findorfail($id);
        $car = Academic_assignment::findorfail(in_c('car', 'id', null));

        $validator = validator::make(
            $request->all(),
            [

                'qualify' => 'required|numeric|between:1,100.0'

            ],
            [
                'qualify.required' => 'El campo nota es obligatorio.',
                'qualify.numeric' => 'El campo nota debe un numero',

            ]
        );
        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        FinalScore::create([
            'academic_assignment_id' => $car->id,
            'student_id' => $JobStudent->student_id,
            'job_id' => $JobStudent->job_id,
            'qualification' => $request->get('qualify')
        ]);


        HomeworkParticipant::where('id', $id)
            ->update([
                'description' => $request->get('description'),
                'state' => true
            ]);
        return back()->withToastSuccess('Nota asignada');
    }

    public function modified_qualify(request $request, $id)
    {

        $validator =  validator::make(
            $request->all(),
            [
                'mqualify' => 'required|numeric|between:1,100.0'
            ],
            [
                'mqualify.required' => 'El campo Rv es obligatorio',
                'mqualify.numeric' => 'El campo Rv debe ser un numero entero o un decimal'

            ]
        );

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        FinalScore::where('id', $id)
            ->update([
                'qualification' => $request->get('mqualify'),

            ]);

        return back()->withToastSuccess('Nota modificada correctamente');
    }

    public function edit($id)
    {
        $homework = job::find($id);

        return view('homework.edit', compact('homework'));
    }

    public function update(request $request, $id)
    {

        $validator = validator::make(
            $request->all(),
            [
                'title' => 'required|max:80',
                'description' => 'required|max:500',
                'deliverdate' => 'required|date',
                'resource' => 'mimes:docx,XLSX,pdf|max:100',
                'state' => 'required|string'
            ],
            [
                'title.required' => 'El campo título es obligatorio.',
                'description.required' => 'Por favor ingrese una descripcion de la tarea.',
                'deliverdate.required' => 'por favor ingrese la fecha de entrega de la tareas',
                'resource.mimes' => "Los recursos solo aceptan archivos word, excel o pdf",
                'state.required' => 'El campo estado es obligatorio',
                'state.string' => 'El campo estado debe ser de tipo letra.'

            ]


        );

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }
        $car = Academic_assignment::findorfail(in_c('car', 'id', null));
        $homework = Job::find($id);
        if ($request->hasFile('resource')) {

            $NameResource = str_replace(' ', '_', $request->file('resource')->getClientOriginalName());
            Storage::delete('homeworks/' . $car->subject->nombre . '_' . $car->course->course . '_' . $car->course->variation . '_' . $homework->resource);
            Job::findorfail($id)->update(
                [
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'deliver_date' => $request->get('deliverdate'),
                    'resource' => $car->subject->nombre . '_' . $car->course->course . '_' . $car->course->variation . '_' . $NameResource,
                    'state' => $request->get('state')

                ]
            );
            $request->file('resource')->storeAs('homeworks',  $car->subject->nombre . '_' . $car->course->course . '_' . $car->course->variation . '_' . $NameResource);
            return back()->withToastSuccess('tarea Actualizada');
        } else {
            Job::findorfail($id)->update(
                [
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'deliver_date' => $request->get('deliverdate'),

                    'resource' =>  $homework->resource,
                    'state' => $request->get('state')

                ]
            );
            return back()->withToastSuccess('tarea Actualizada');
        }

        //return $request->file('resource')->getc;
    }

    public function homeworkend($id)
    {
    }
}
