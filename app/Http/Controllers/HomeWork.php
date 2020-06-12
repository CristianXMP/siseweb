<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeWork extends Controller
{
    public function homework()
    {
        return view('homework.homework');
    }

    public function PublicHomework(Request $request, $id){
        
    }
}
