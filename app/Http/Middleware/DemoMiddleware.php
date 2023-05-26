<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // $key = $request->query('key');
        $key = $request->key;
        if ($key == '123') {
            return $next($request);
        } else {
            // Redirect to the desired URL
            return response()->json('unauthorized', 401);
        }
    }
}
