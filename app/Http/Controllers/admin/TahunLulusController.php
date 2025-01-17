<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    /**
     * Menampilkan daftar tahun lulus.
     */
    public function index()
    {
        // Mengambil semua data tahun lulus
        $years = TahunLulus::all();
        return view('admin.tahun_lulus.index', compact('years'));
    }

    /**
     * Menampilkan form untuk menambah tahun lulus.
     */
    public function create()
    {
        return view('admin.tahun_lulus.create');
    }

    /**
     * Menyimpan data tahun lulus baru.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'tahun_lulus' => 'required|unique:tbl_tahun_lulus,tahun_lulus|max:10',
            'keterangan' => 'nullable|max:50',
        ]);

        // Simpan data ke database
        TahunLulus::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data tahun lulus.
     */
    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $year = TahunLulus::findOrFail($id);
        return view('admin.tahun_lulus.edit', compact('year'));
    }

    /**
     * Memperbarui data tahun lulus yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $validated = $request->validate([
            'tahun_lulus' => 'required|max:10|unique:tbl_tahun_lulus,tahun_lulus,' . $id . ',id_tahun_lulus',
            'keterangan' => 'nullable|max:50',
        ]);

        // Ambil data berdasarkan ID
        $year = TahunLulus::findOrFail($id);
        $year->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil diperbarui!');
    }

    /**
     * Menghapus data tahun lulus.
     */
    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        $year = TahunLulus::findOrFail($id);
        $year->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil dihapus!');
    }
}
