<?php

if (! function_exists('in_c')) {

    function in_c($key1, $key2)
    {
        $array1 = session($key1);
        return $array1[$key2];
    }
}