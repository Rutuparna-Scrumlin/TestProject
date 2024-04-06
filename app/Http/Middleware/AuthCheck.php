<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {  
        //dd(Session()->has('loginId'));
        if(!Session()->has('loginId')){
            //dd(0);
            //return redirect()->route('dashboard');
            return redirect('/');
        }
        return $next($request);
    }
}
