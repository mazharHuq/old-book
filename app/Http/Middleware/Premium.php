<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Premium
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth('web')->user()){
            return redirect('/user/login');
            return route('user.dashboard');
        }else
        {
            if(auth('web')->user() &&  !auth('web')->user()->premium){
                return $next($request);
            }else{
                return redirect('/user/premium');

            }

        }
    }
}
