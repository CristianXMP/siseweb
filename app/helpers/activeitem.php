<?php
use Illuminate\Support\Facades\Route;

function active($path){



        //return request()->is($path) ? 'bg-success text-white' : '';
        if (request()->is($path) == 'home') {
            return  'bg-success text-white';
        }
        if (route::is($path.'.index')) {
            return  'bg-success text-white';
        }
        if (route::is($path.'.create')) {
            return  'bg-success text-white';
        }

        if (route::is($path.'.edit')) {
            return  'bg-success text-white';
        }
        if (route::is($path.'.show')) {
            return  'bg-success text-white';
        }



}

