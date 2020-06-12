<?php
use Illuminate\Support\Facades\Route;

//------/itemsdinamics/-----

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

//------/datos de inicio de de session\------

if (! function_exists('in_c')) {

    function in_c($key1, $key2, $key3)
    {
        if (is_null($key3)) {
            $array1 = session($key1);
        return $array1->$key2;
        }

        $array1 = session($key1);
        return $array1->$key2->$key3;
    }
}
