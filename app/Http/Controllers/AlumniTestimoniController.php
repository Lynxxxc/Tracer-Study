<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniTestimoniController extends Controller
{
    /**
     * Menampilkan form untuk membuat testimoni baru.
     */
    public function create()
    {
        return view('testimoni.create');
    }

    /**
     * Menyimpan testimoni baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'testimoni' => 'required|string|max:1000',
        ]);

        // Simpan testimoni baru
        Testimoni::create([
            'id_alumni' => Auth::user()->alumni->id_alumni,
            'testimoni' => $request->testimoni,
            'tgl_testimoni' => now(),
        ]);

        // Redirect ke dashboard setelah testimoni berhasil disimpan
        return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit testimoni.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::where('id_alumni', Auth::id())->findOrFail($id);
        return view('testimoni.edit', compact('testimoni'));
    }

    /**
     * Memperbarui testimoni di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'testimoni' => 'required|string|max:1000',
        ]);

        $testimoni = Testimoni::where('id_alumni', Auth::id())->findOrFail($id);
        $testimoni->update([
            'testimoni' => $request->testimoni,
        ]);

        return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Menghapus testimoni dari database.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::where('id_alumni', Auth::id())->findOrFail($id);
        $testimoni->delete();

        return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function dashboard()
    {
        // Ambil semua testimoni dan hubungkan dengan data alumni
        $testimonis = Testimoni::with('alumni')->latest()->get();
        $sekolah = Sekolah::first();
        // dd($sekolah);   
        // dd($testimonis);
    
        // Kirim variabel testimoni ke tampilan dashboard
        return view('alumni.dashboard', compact('testimonis', 'sekolah'));
    }
}
