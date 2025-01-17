<?php

namespace App\Http\Controllers\Admin;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        // Ambil semua data program keahlian beserta bidang keahlian terkait
        $programKeahlian = ProgramKeahlian::with('bidangKeahlian')->get();
        return view('admin.program-keahlian.index', compact('programKeahlian'));
    }

    public function create()
    {
        // Ambil data bidang keahlian untuk dropdown di form
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.program-keahlian.create', compact('bidangKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|unique:tbl_program_keahlian,kode_program_keahlian|max:10',
            'program_keahlian' => 'required|max:100',
        ]);

        ProgramKeahlian::create([
            'id_bidang_keahlian' => $request->id_bidang_keahlian,
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
        ]);

        return redirect()->route('admin.program-keahlian.index')->with('success', 'Program keahlian berhasil ditambahkan.');
    }

    public function edit(ProgramKeahlian $programKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.program-keahlian.edit', compact('programKeahlian', 'bidangKeahlian'));
    }

    public function update(Request $request, ProgramKeahlian $programKeahlian)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|max:10|unique:tbl_program_keahlian,kode_program_keahlian,' . $programKeahlian->id_program_keahlian . ',id_program_keahlian',
            'program_keahlian' => 'required|max:100',
        ]);

        $programKeahlian->update([
            'id_bidang_keahlian' => $request->id_bidang_keahlian,
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
        ]);

        return redirect()->route('admin.program-keahlian.index')->with('success', 'Program keahlian berhasil diperbarui.');
    }

    public function destroy(ProgramKeahlian $programKeahlian)
    {
        $programKeahlian->delete();

        return redirect()->route('admin.program-keahlian.index')->with('success', 'Program keahlian berhasil dihapus.');
    }
}
