<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AlumniAuthController extends Controller
{

    protected $guard = 'alumni';
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('tracerstudy.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        logger()->info('Login attempt', ['email' => $request->email]);

        $credentials = $request->only('email', 'password');
        $alumni = \App\Models\Alumni::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            // Auth::guard('alumni')->login($alumni); // Pastikan login dilakukan dengan benar
            // $request->session()->regenerate();    // Regenerasi sesi setelah login
            
            // logger()->info('Session Data:', session()->all());
            return redirect()->intended('/dashboard');
        }
        
    }
}
