<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Admin()
    {
        return view('home');
    }

    public function Teacher(){
        return view('courses_home.dashboardCourses');
    }

    public function Student(){
        return "hola estudiante";
    }
}
