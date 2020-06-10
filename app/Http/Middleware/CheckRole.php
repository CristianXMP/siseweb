<?php

namespace App\Http\Middleware;

use Closure;
use  Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

    if (Auth::check()){

        if (Auth::user()->type_user == $role){
            return $next($request);

        }else{

           return back();
        }

      

    }



    }
}