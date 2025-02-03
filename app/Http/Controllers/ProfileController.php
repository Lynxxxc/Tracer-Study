<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman data diri.
     */
    public function dataDiri()
    {
        $user = Auth::user();
        $alumni = Alumni::where('user_id', $user->id)->first();

        return view('tracerstudy.data_diri', compact('alumni'));
    }

    /**
     * Fungsi untuk update profile alumni.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $alumni = Alumni::where('user_id', $user->id)->first();

        // Jika belum mengisi Tracer Study, tampilkan alert dan redirect ke pengisian data
        if (!$alumni) {
            return redirect()->route('tracerstudy.create')->with('warning', 'Harap isi Tracer Study terlebih dahulu sebelum memperbarui profil.');
        }

        // Validasi data input
        $validatedData = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        // Update data alumni
        $alumni->update($validatedData);

        return redirect()->route('tracerstudy.data_diri')->with('status', 'Data berhasil diperbarui');
    }
}
