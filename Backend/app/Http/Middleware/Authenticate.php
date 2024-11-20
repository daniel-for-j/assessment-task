<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->bearerToken()) {
            $user = User::where('api_token', $request->bearerToken())->first();
            if ($user) {
                auth()->setUser($user);
            }
            else {
             return response()->json(['message'=>"Unauthenticated"], 401);

            }
        }
      
    
    
      
        return $next($request);
    }


}
