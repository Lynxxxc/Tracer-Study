<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TracerKuliah;
use App\Models\Alumni;

class TracerKuliahController extends Controller
{
    // Menampilkan data tracer kuliah
    public function index()
    {
        $tracers = TracerKuliah::with('alumni')->get();
        return view('admin.tracer-kuliah.index', compact('tracers'));
    }

    // Form tambah tracer kuliah
    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.tracer-kuliah.create', compact('alumni'));
    }

    // Simpan data tracer kuliah
    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|string|max:45',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        TracerKuliah::create($request->all());
        return redirect()->route('admin.tracer-kuliah.index')->with('success', 'Data tracer kuliah berhasil ditambahkan.');
    }

    // Form edit tracer kuliah
    public function edit($id)
    {
        $tracer = TracerKuliah::findOrFail($id);
        $alumni = Alumni::all();
        return view('admin.tracer-kuliah.edit', compact('tracer', 'alumni'));
    }

    // Update data tracer kuliah
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|string|max:45',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        $tracer = TracerKuliah::findOrFail($id);
        $tracer->update($request->all());
        return redirect()->route('admin.tracer-kuliah.index')->with('success', 'Data tracer kuliah berhasil diperbarui.');
    }

    // Hapus data tracer kuliah
    public function destroy($id)
    {
        $tracer = TracerKuliah::findOrFail($id);
        $tracer->delete();
        return redirect()->route('admin.tracer-kuliah.index')->with('success', 'Data tracer kuliah berhasil dihapus.');
    }
}
