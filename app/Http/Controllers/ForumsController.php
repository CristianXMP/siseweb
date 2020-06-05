<?php

namespace App\Http\Controllers;

use App\Academic_assignment;
use App\Course;
use App\Forum;
use App\Forum_coment;
use App\Forum_like;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ForumsController extends Controller
{
    public function public_forum(Request $request, $id){



        $validator = validator::make(
            $request->all(),
            [
                'title' => 'required|max:80|min:8',
                'content' => 'required|max:250|min:20'
            ],
            [
                'title.required' => 'El campo titulo es obligatorio.',
                'content.required' => 'Por favor ingrese lo que desea publicar',

            ]
        );

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        $GetAsignament = Academic_assignment::where('subject_id', $id)->get();

        $forum = new Forum([
            'academic_assignment_id' => $GetAsignament[0]['id'],
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        $forum->save();

        return back()->withToastSuccess('Foro Publicado!');


    }


    public function coments_likes($id)
    {

        $GetForum = Forum::findorfail($id);

        $coments = Forum_coment::where('forum_id', $id)->get();

        return view('forum.coments', compact('GetForum','coments'));

    }


    public function public_coment(Request $request, $id)
    {
        $GetForum = Forum::findorfail($id);
        $CountComent = $GetForum->comentcount + 1;
        $GetAsignament = Academic_assignment::findorfail($GetForum->academic_assignment_id);
        $TeacherToComent = Teacher::findorfail($GetAsignament->teacher_id);

        $validator = validator::make(
            $request->all(),
            [
                'coment' => 'required|max:250|min:2',
            ],
            [
                'coment.required' => 'Por favor escribe tu comentario.'


            ]
        );

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }

        if(Auth::user()->type_user == 'Teacher')
        {
            $teacher_info  = Teacher::findorfail(Auth::user()->teacher_id);



            $coment = new Forum_coment([
                'forum_id' => $id,
                'name_user' => $teacher_info->first_name .' '. $teacher_info->last_name,
                'type_user' => Auth::user()->type_user,
                'coment' => $request->get('coment'),

            ]);



            $coment->save();

            Forum::findorfail($id)->update(['comentcount' => $CountComent]);

            return back()->withToastSuccess('Comentario publicado!');
        }

        if(Auth::user()->type_user == 'Student')
        {
            $student_info  = Student::findorfail(Auth::user()->student_id);



            $coment = new Forum_coment([
                'forum_id' => $id,
                'student_id' => Auth::user()->student_id,
                'name_user' => $student_info->first_name .' '. $student_info->last_name,
                'type_user' => Auth::user()->type_user,
                'coment' => $request->get('coment'),

            ]);



            $coment->save();

            Forum::findorfail($id)->update(['comentcount' => $CountComent]);

            return back()->withToastSuccess('Comentario publicado!');
        }



    }

    public function like_coment($id)
    {
        $forum = Forum::findorfail($id);
        $newlike = $forum->likecount + 1;
       if(Auth::user()->type_user == 'Teacher')
       {

        $VerifyLikes  = DB::table('forum_likes')
        ->where('forum_id', '=', $id)
        ->where('teacher_id', '=', Auth::user()->teacher_id)
        ->get();

        if ($VerifyLikes->isEmpty()) {


            Forum_like::create([
                    'forum_id' => $id,
                    'teacher_id' => Auth::user()->teacher_id
                ]);
                Forum::where('id', $id)
              ->update(['likecount' => $newlike]);

              return back()->withToastSuccess('Te ha gustado este foro');

        } else {

            return back()->withToastInfo('Ya te ha gustado este foro!');
        }

       }


       if(Auth::user()->type_user == 'Student')
       {

        $VerifyLikes  = DB::table('forum_likes')
        ->where('forum_id', '=', $id)
        ->where('student_id', '=', Auth::user()->student_id)
        ->get();


       if ($VerifyLikes->isEmpty()) {


            Forum_like::create([
                    'forum_id' => $id,
                    'student_id' => Auth::user()->student_id
                ]);
                Forum::where('id', $id)
              ->update(['likecount' => $newlike]);

              return back()->withToastSuccess('Te ha gustado este foro');

        } else {

            return back()->withToastInfo('Ya te ha gustado este foro!');
        }

       }
    }
}
