<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class ProfeAcess
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
        
        if(Auth::check() && Auth::user()->profe == 1){
            return $next($request);
        }else{
            if(Auth::check() && Auth::user()->admin == 1){
                return $next($request);
            }
            else{
            

            if(!Auth::check()){
                return redirect('/login');
            }
            dd("Voce nao tem acesso");
            }
        }
    }
}

