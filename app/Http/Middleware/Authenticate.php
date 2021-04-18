<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if (!Auth::check())
            return redirect()->to('login');
        if (Auth::user()->roles[0]->id != 1)
            return back()->with('error', 'You need to be a student to access this');
        return $next($request);
        // return $next($request);
    }
}
