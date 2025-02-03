<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniAlumniController extends Controller
{
    /**
     * Menampilkan form untuk menambahkan testimoni.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('testimoni.create');
    }

    /**
     * Menyimpan testimoni baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'testimoni' => 'required|string|max:1000',
        ]);

        try {
            // Simpan testimoni
            $testimoni = new Testimoni();
            $testimoni->id_alumni = Auth::user()->id_alumni;  // Asumsikan user sudah login
            $testimoni->testimoni = $validated['testimoni'];
            $testimoni->tgl_testimoni = now(); // Waktu testimoni disubmit
            $testimoni->save();

            // Redirect dengan pesan sukses
            return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika ada error, tampilkan pesan error
            return back()->withErrors(['error' => 'Gagal menyimpan testimoni. Coba lagi.'])->withInput();
        }
    }
}
