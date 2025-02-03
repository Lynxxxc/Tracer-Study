<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\Alumni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::with('alumni')->paginate(10);
        return view('admin.testimoni.index', compact('testimonis'));
    }


    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.testimoni.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required',
            'tgl_testimoni' => 'required|date',
        ]);

        Testimoni::create($request->all());

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $alumni = Alumni::all();
        return view('admin.testimoni.edit', compact('testimoni', 'alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required',
            'tgl_testimoni' => 'required|date',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }

}
