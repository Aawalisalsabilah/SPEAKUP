<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('student')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
