<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        //dd($request);
        //  Za autorization key koji ima vred
        $user = User::where("token",$request->header('Authorization'))->first();
        //dd($user);
        if($request->header('Authorization') == $user->token){
            return $next($request);
        } else {
            return "Greskaa";
        }

    }
}
