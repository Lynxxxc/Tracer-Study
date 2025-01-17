<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerKerja;
use App\Models\Alumni;
use Illuminate\Http\Request;

class TracerKerjaController extends Controller
{
    public function index()
    {
        $tracers = TracerKerja::with('alumni')->get();
        return view('admin.tracer-kerja.index', compact('tracers'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.tracer-kerja.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required',
            'tracer_kerja_nama' => 'required',
            'tracer_kerja_jabatan' => 'required',
            'tracer_kerja_status' => 'required',
            'tracer_kerja_lokasi' => 'required',
            'tracer_kerja_alamat' => 'required',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable',
        ]);

        TracerKerja::create($request->all());
        return redirect()->route('admin.tracer-kerja.index')->with('success', 'Data Tracer Kerja berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tracer = TracerKerja::findOrFail($id);
        $alumni = Alumni::all();
        return view('admin.tracer-kerja.edit', compact('tracer', 'alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required',
            'tracer_kerja_nama' => 'required',
            'tracer_kerja_jabatan' => 'required',
            'tracer_kerja_status' => 'required',
            'tracer_kerja_lokasi' => 'required',
            'tracer_kerja_alamat' => 'required',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable',
        ]);

        $tracer = TracerKerja::findOrFail($id);
        $tracer->update($request->all());
        return redirect()->route('admin.tracer-kerja.index')->with('success', 'Data Tracer Kerja berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tracer = TracerKerja::findOrFail($id);
        $tracer->delete();
        return redirect()->route('admin.tracer-kerja.index')->with('success', 'Data Tracer Kerja berhasil dihapus!');
    }
}
