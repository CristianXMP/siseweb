<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */




    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('usuarios.index');
    }

    public function create(){


        $student = Student::where('is_user', false)->orderBy('first_name', 'desc')->get();

        $teacher = Teacher::where('is_user', false)->orderBy('first_name', 'desc')->get();

        return view('usuarios.create', compact('teacher','student'));


    }


    public function store(request $request)
    {

        if ($request->get('student') == "student") {

            $validator = Validator::make($request->all(), [

                'estudiante' => 'required',

            ]);

            if ($validator->fails()) {
                return back()->withToastError($validator->messages()->all()[0])->withInput();
            }

                $student = Student::find($request->get('estudiante'));

                    if (User::where('student_id', $request->get('estudiante'))->exists()) {

                        return back()->withToastError('Este usuario ya existe');

                    }else{


                        User::create([

                            'nombre' => $student->first_name,
                            'apellidos' => $student->second_name,
                            'cargo' => '',
                            'teacher_id' => null,
                            'student_id' => $student->id,
                            'cedula'    => $student->number_document,
                            'cedula_verified_at' => now(),
                            'password' => bcrypt($student->number_document),
                            'type_user' => 'Student',
                            'remember_token' => Str::random(10)

                        ]);

                        Student::where('is_user', false)
                        ->where('id', $request->get('estudiante'))
                        ->update(['is_user' => true]);

                        alert()->success('Siseweb','Usuario generado correctamente. las credeciales para iniciar sesión
                        son los numeros de documentos');

                        return back();


                    }
        }


        if ($request->get('teacher') == "teacher") {

            $validator = Validator::make($request->all(), [

                'profesor' => 'required',

            ]);

            if ($validator->fails()) {
                return back()->withToastError($validator->messages()->all()[0])->withInput();
            }

                $teacher = Teacher::find($request->get('profesor'));

                    if (User::where('teacher_id', $request->get('profesor'))->exists()) {

                        return back()->withToastError('Este usuario ya existe');

                    }else{


                        User::create([

                            'nombre' => $teacher->first_name,
                            'apellidos' => $teacher->second_name,
                            'cargo' => 'profesor',
                            'teacher_id' => null,
                            'student_id' => $teacher->id,
                            'cedula'    => $teacher->number_document,
                            'cedula_verified_at' => now(),
                            'password' => bcrypt($teacher->number_document),
                            'type_user' => 'Teacher',
                            'remember_token' => Str::random(10)

                        ]);

                        Teacher::where('is_user', false)
                        ->where('id', $request->get('profesor'))
                        ->update(['is_user' => true]);

                        alert()->success('Siseweb','Usuario generado correctamente. las credeciales para iniciar sesión
                        son los numeros de documentos');

                        return back();


                    }
        }





    }
}
