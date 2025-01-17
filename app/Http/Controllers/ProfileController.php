<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan halaman Data Diri
    public function index()
    {
        return view('profile.data-diri');
    }

    // Menangani pembaruan data diri
    public function update(Request $request)
    {
        // Melakukan validasi input
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|max:255',
        ]);

        // Mengambil user yang sedang login
        $user = auth()->user();

        // Memperbarui data diri pengguna dengan data yang sudah tervalidasi
        $user->update($validatedData);

        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('profile')->with('status', 'Profil berhasil diperbarui');
    }
}
