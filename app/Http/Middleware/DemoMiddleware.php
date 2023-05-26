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
        // $key = $request->key;
        // if ($key == '123') {
        //     return $next($request);
        // } else {
        //     // Redirect to the desired URL
        //     //return redirect("/redirect2");
        //     return response()->json('unauthorized', 401);
        // }

        //manipulating request header
        //adding email to header
        //$request->headers->add(['email' => "sazzad@gmail.com"]);

        //incase of remove we just need to define key
        $request->headers->remove('email');

        //replace data using middleware
        //$request->headers->replace(['email'=>"zitu094@gmail.com"]);
        return $next($request);
    }
}
