<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isadmin) {
            return $next($request);  // Lanjutkan ke route berikutnya jika admin
        }

        // Redirect jika bukan admin
        return redirect()->route('tracerstudy.dashboard')->with('error', 'Akses Ditolak: Anda bukan admin!');
    }
}
