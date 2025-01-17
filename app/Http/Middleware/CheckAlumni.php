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
        if (!Auth::guard('alumni')->check()) {
            return redirect('/login')->withErrors(['message' => 'Anda harus login sebagai alumni.']);
        }

        return $next($request);
    }
}
