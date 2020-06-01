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

        $user = User::all();
        return view('usuarios.index', compact('user'));
    }

    public function create(){


        $student = Student::where('is_user', false)->orderBy('first_name', 'desc')->get();

        $teacher = Teacher::where('is_user', false)->orderBy('first_name', 'desc')->get();

        return view('usuarios.create', compact('teacher','student'));


    }


    public function store(request $request)
    {
          //generacion de usuarios para estudiantes
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
                            'cargo' => 'Estudiante',
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

        //generacion de usuarios para profesores
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
                            'teacher_id' => $teacher->id,
                            'student_id' => null,
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

        //creacion de administradores
        if ($request->get('admin') == "admin") {

            $validator = Validator::make($request->all(), [

                'nombre' => 'required|string',
                'apellidos' => 'required|string',
                'cargo' => 'required|string',
                'cedula' => 'required|min:10|max:10|unique:users'

            ]);

            if ($validator->fails()) {
                return back()->withToastError($validator->messages()->all()[0])->withInput();
            }





                        User::create([

                            'nombre' => $request->get('nombre'),
                            'apellidos' => $request->get('apellidos'),
                            'cargo' => $request->get('cargo'),
                            'teacher_id' => null,
                            'student_id' => null,
                            'cedula'    => $request->get('cedula'),
                            'cedula_verified_at' => now(),
                            'password' => bcrypt($request->get('cedula')),
                            'type_user' => 'Admin',
                            'remember_token' => Str::random(10)

                        ]);

                        alert()->success('Siseweb','Administrador creado correctamente. las credeciales para iniciar sesión
                        son los numeros de documentos');

                        return back();



        }





    }


    public function restore($id){
        $user = User::findorfail($id);
        User::where('id', $id)
        ->update(['password' =>  bcrypt($user->cedula)]);

        return back()->withToastSuccess('Usuario restaurado correctamente');



    }

    public function destroy($id){

        $user = User::findorfail($id);

        if ($user->type_user == "Admin") {

            return back()->withToastError('Los usuarios administradores no se pueden eliminar');
        }


        if ($user->type_user == "Student") {

            Student::where('is_user', true)
            ->where('id', $user->student_id)
            ->update(['is_user' => false]);

            $user->delete();

            return back()->withToastSuccess('Usuario desactivado');


        }

        if ($user->type_user == "Teacher") {

            Teacher::where('is_user', true)
            ->where('id', $user->teacher_id)
            ->update(['is_user' => false]);

            $user->delete();

            return back()->withToastSuccess('Usuario desactivado');


        }

    }
}
