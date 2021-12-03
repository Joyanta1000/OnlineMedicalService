<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class PatientMiddleware
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
        if(Session::has('email')){
            if(session()->get('role')==3 && session()->get('is_active')==1){
                return $next($request);
            }
            else{
                return redirect('login/User_Login');
            }
        }
        else{
            return redirect('login/User_Login');
        }
    }
}
