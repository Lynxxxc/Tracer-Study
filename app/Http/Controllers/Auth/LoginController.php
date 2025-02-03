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
                $user->alumni->update(['status_login' => true]);
                $request->session()->flash('status', 'Anda telah berhasil login.');
                return redirect('/dashboard');
            } elseif ($user->isadmin) {
                return redirect()->route('admin.dashboard');
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Update last_login_at
                Auth::user()->update(['last_login_at' => now()]);

                return redirect()->intended('dashboard');
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
    if(!Auth::user()->isAdmin){
        Auth::user()->alumni->update(['status_login' => false]);
    }
    Auth::logout(); // Pastikan menggunakan facade Auth
    $request->session()->invalidate(); // Menghapus session yang aktif
    $request->session()->regenerateToken(); // Menghasilkan token CSRF baru

    // Menyimpan pesan flash untuk ditampilkan setelah redirect
    $request->session()->flash('status', 'Anda telah berhasil logout.');

    return redirect('/dashboard'); // Arahkan ke halaman dashboard setelah logout
}

}
