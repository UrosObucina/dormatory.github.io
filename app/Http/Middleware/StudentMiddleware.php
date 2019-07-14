<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use JWTAuth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // TODO ovde mora da se dohvati iy sesije User i da se vidi da li je id_UserType == 1 i pomocu toga da mu se dozvoli izvrsavanje ruta
        $user = User::where("token", $request->header('Authorization'))->first();
        //dd($user,$request->header('Authorization'));
        if ($request->header('Authorization') == $user->token) {
            $token = $request->header('Authorization');
            $dataRaw = explode(".", $token);
             $dataRaw = base64_decode($dataRaw[1]);
             $now = time();
             $dataRaw = json_decode($dataRaw);
             if($dataRaw->exp < $now - 60) {
                 //dd($dataRaw->exp,$now - 60);
                 return "No_Need";
             }
            return $next($request);
        } else {
            return "Greskaa";
        }

    }
}
