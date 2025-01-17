<?php

namespace App\Http\Controllers\Admin;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.bidang-keahlian.index', compact('bidangKeahlian'));
    }

    public function create()
    {
        return view('admin.bidang-keahlian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|string|max:10',
            'bidang_keahlian' => 'required|string|max:100',
        ]);

        BidangKeahlian::create($request->all());
        return redirect()->route('admin.bidang-keahlian.index')->with('success', 'Bidang Keahlian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        return view('admin.bidang-keahlian.edit', compact('bidangKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|string|max:10',
            'bidang_keahlian' => 'required|string|max:100',
        ]);

        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->update($request->all());
        return redirect()->route('admin.bidang-keahlian.index')->with('success', 'Bidang Keahlian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->delete();
        return redirect()->route('admin.bidang-keahlian.index')->with('success', 'Bidang Keahlian berhasil dihapus!');
    }

    public function managePrograms($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $programKeahlian = ProgramKeahlian::where('id_bidang_keahlian', $id)->get();
        return view('admin.bidang-keahlian.manage_programs', compact('bidangKeahlian', 'programKeahlian'));
    }

    public function manageConcentrations($id)
    {
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $konsentrasiKeahlian = KonsentrasiKeahlian::where('id_program_keahlian', $id)->get();
        return view('admin.bidang-keahlian.manage_concentrations', compact('programKeahlian', 'konsentrasiKeahlian'));
    }
}
