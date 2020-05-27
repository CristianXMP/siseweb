<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' =>'showLoginForm']);
    }

    public function showLoginForm()
    {
    
        return view('auth.login');



    }

    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'cedula' => 'required|numeric|digits:10',
            'password' => 'required|max:10'
        ],
            [
                'cedula.required' => 'El campo numero de documento es obligatorio.'
            ]);

        if ($validator->fails()) {
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }else{

            $credentials = [
                'cedula' => request()->get('cedula'),
                'password' => request()->get('password')
            ];

            if (Auth::attempt($credentials))
            {
                $type_user = DB::table('users')->select('type_user')->where('cedula', '=', $credentials['cedula'])->get();



                if (isset($type_user)) {

                    if ( $type_user[0]->type_user == "Admin") {

                        return redirect()->route('Admin');

                    }else{

                        if ( $type_user[0]->type_user == "Teacher") {

                            return redirect()->route('Profesor');

                        }

                        if ( $type_user[0]->type_user == "Student") {

                            return redirect()->route('Estudiante');

                        }

                    }



                }


            }else{

                return back()->withToastError(trans('auth.failed'))->withInput(request(['cedula']));//redireccionamos a loging y mostramos un mensaje de error
            }

        }




    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->withToastSuccess('Sesión cerrada correctamente');
    }


}
