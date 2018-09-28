<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::User()->role === User::ADMIN){
            return $next($request);
        }
        elseif (Auth::User()->role === User::SENIOR_MENTOR){
            return $next($request);
        }
        elseif (Auth::User()->role === User::STA){
            return $next($request);
        }
        return redirect(route('home'));
    }
}
