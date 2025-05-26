<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $token = $request->header('Authorization');

        if (!$token || $token !== 'Bearer MEU_TOKEN_SECRETO') {
            return response()->json(['error' => 'Token inválido ou ausente.'], 401);
        }

        return $next($request);
    }
}
