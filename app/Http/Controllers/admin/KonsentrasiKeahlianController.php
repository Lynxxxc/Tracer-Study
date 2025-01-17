<?php

namespace App\Http\Controllers\Admin;

use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonsentrasiKeahlianController extends Controller
{
    public function index()
    {
        // Ambil semua data konsentrasi keahlian beserta program dan bidang keahlian terkait
        $konsentrasiKeahlian = KonsentrasiKeahlian::with('programKeahlian.bidangKeahlian')->get();
        return view('admin.konsentrasi-keahlian.index', compact('konsentrasiKeahlian'));
    }

    public function create()
    {
        // Ambil data program keahlian beserta bidang keahlian terkait untuk dropdown di form
        $programKeahlian = ProgramKeahlian::with('bidangKeahlian')->get();
        return view('admin.konsentrasi-keahlian.create', compact('programKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|unique:tbl_konsentrasi_keahlian,kode_konsentrasi_keahlian|max:10',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        KonsentrasiKeahlian::create([
            'id_program_keahlian' => $request->id_program_keahlian,
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->route('admin.konsentrasi-keahlian.index')->with('success', 'Konsentrasi keahlian berhasil ditambahkan.');
    }

    public function edit(KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $programKeahlian = ProgramKeahlian::with('bidangKeahlian')->get();
        return view('admin.konsentrasi-keahlian.edit', compact('konsentrasiKeahlian', 'programKeahlian'));
    }

    public function update(Request $request, KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|max:10|unique:tbl_konsentrasi_keahlian,kode_konsentrasi_keahlian,' . $konsentrasiKeahlian->id_konsentrasi_keahlian . ',id_konsentrasi_keahlian',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        $konsentrasiKeahlian->update([
            'id_program_keahlian' => $request->id_program_keahlian,
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->route('admin.konsentrasi-keahlian.index')->with('success', 'Konsentrasi keahlian berhasil diperbarui.');
    }

    public function destroy(KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $konsentrasiKeahlian->delete();

        return redirect()->route('admin.konsentrasi-keahlian.index')->with('success', 'Konsentrasi keahlian berhasil dihapus.');
    }
}
