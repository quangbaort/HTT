<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return $next($request);
        }
        elseif(Auth::user()->role == 1){
            return redirect(route('dashboard'));
        }
        else {
            return redirect(route('userLogin'));
        }
    }
}
