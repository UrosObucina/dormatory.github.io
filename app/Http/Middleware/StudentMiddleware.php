<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
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
        // TODO ovde mora da se dohvati iy sesije User i da se vidi da li je id_UserType == 1 i pomocu toga da mu se dozvoli iyvrsavanje ruta

        //  Za autorization key koji ima vred
        if($request->header('Authorization') && $request->header('Authorization') == 1){
            return $next($request);
        } else {
            return "Greskaa";
        }

    }
}
