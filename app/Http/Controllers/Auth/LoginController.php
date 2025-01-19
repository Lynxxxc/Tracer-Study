<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan untuk mengimpor Auth

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi dan login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            // Periksa apakah pengguna adalah alumni
            if (!$user->isadmin) {
                return redirect()->route('tracerstudy.dashboard');
            } elseif ($user->isadmin) {
                return redirect()->route('admin.dashboard');
            }
    
        // Jika bukan admin atau alumni
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun tidak valid.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout(); // Pastikan menggunakan facade Auth
        $request->session()->invalidate(); // Menghapus session yang aktif
        $request->session()->regenerateToken(); // Menghasilkan token CSRF baru

        return redirect()->route('welcome'); // Arahkan ke halaman welcome setelah logout
    }
}
