<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'perawat') {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}