<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAlumni
{
    public function handle(Request $request, Closure $next)
    {

        // Cek apakah pengguna login sebagai alumni
        if (auth()->check() && auth()->user()->alumni) {
            return $next($request);
        }

        return $next($request);
    }
}
