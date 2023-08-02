<?php

namespace Ejntaylor\Vellum\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return $next($request);
        }

        throw new \Exception("Unauthenticated.");
    }
}
