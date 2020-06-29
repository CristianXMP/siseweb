<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\likeadvertisement;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function publicar(Request $request, $id)
    {
        if (Auth::user()->type_user == 'Teacher') {

            $validator = Validator::make(
                $request->all(),
                [
                    'anuncio'        => 'required|max:250|min:8'
                ]
            );
            if ($validator->fails()) {
                return back()->withToastError($validator->messages()->all()[0])->withInput();
            }


            $advertisement = new Advertisement([
                'Academic_assignment_id' => $id,
                'announced' => $request->get('anuncio'),
            ]);

            $advertisement->save();


            return back()->withToastSuccess('Anuncio Publicado!');
        }


        /* */
    }

    public function likes($id)
    {

        $like = Advertisement::findorfail($id);
        $newlike = $like->likes + 1;



        $VerifyLikes  = DB::table('likeadvertisements')
            ->where('advertisement_id', '=', $id)
            ->where('student_id', '=', Auth::user()->student_id)
            ->get();

        if ($VerifyLikes->isEmpty()) {


            likeadvertisement::create([
                'advertisement_id' => $id,
                'student_id' => Auth::user()->student_id
            ]);
            Advertisement::where('id', $id)
                ->update(['likes' => $newlike]);
            return back()->withToastSuccess('Te ha gustado un anuncio');
        } else {

            return back()->withToastInfo('Ya te ha gustado este anuncio!');
        }
    }
}
