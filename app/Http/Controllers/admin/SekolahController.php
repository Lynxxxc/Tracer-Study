<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SekolahController extends Controller
{
    // Display all sekolahs
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolahs'));
    }

    // Show form to create a new sekolah
    public function create()
    {
        return view('admin.sekolah.create');
    }

    // Store the newly created sekolah
    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required|max:10',
            'nss' => 'required|max:20',
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'website' => 'nullable|max:50',
            'email' => 'nullable|max:50',
        ]);

        Sekolah::create($request->all());
        return redirect()->route('admin.sekolah.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    // Show form to edit an existing sekolah
    public function edit(Sekolah $sekolah)
    {
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    // Update the existing sekolah
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'npsn' => 'required|max:10',
            'nss' => 'required|max:20',
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'website' => 'nullable|max:50',
            'email' => 'nullable|max:50',
        ]);

        $sekolah->update($request->all());
        return redirect()->route('admin.sekolah.index')->with('success', 'Sekolah berhasil diubah.');
    }

    // Delete a sekolah
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('admin.sekolah.index')->with('success', 'Sekolah berhasil dihapus.');
    }
}
