<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //  auth check 
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // // role 1 admin 
        if (Auth::user()->role == 1) {
            return $next($request);
         }
        // // role 2 manager 
         if (Auth::user()->role == 2) {
            return redirect()->route('manager');
         }
        // // role 3 user 
         if (Auth::user()->role == 3) {
            return redirect()->route('user');
         }


    }
}
