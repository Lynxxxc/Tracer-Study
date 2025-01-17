<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login admin
    public function showLoginForm()
    {
        return view('admin.auth.login'); // Sesuaikan dengan view login admin yang Anda buat
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        // if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
        //     return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');
        // }

        // if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
        //     return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');
        // }
        
        auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');

        // Jika login gagal
        // return redirect()->back()->withErrors(['message' => 'Email atau password salah.']);
    }

    // Logout admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }

    // Dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard'); // Sesuaikan dengan view dashboard admin
    }
}
