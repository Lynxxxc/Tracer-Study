<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alumni;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    public function index()
    {
        // Menampilkan data alumni beserta status, tahun lulus, dan konsentrasi keahlian
        $alumni = Alumni::with('status', 'tahunLulus', 'konsentrasiKeahlian')->get();
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        // Ambil data tahun lulus
        $years = TahunLulus::all();

        // Ambil data status alumni
        $statuses = StatusAlumni::all();

        // Ambil data konsentrasi keahlian
        $concentrations = KonsentrasiKeahlian::all();

        // Kirim data ke view
        return view('admin.alumni.create', compact('years', 'statuses', 'concentrations'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nisn' => 'required|unique:tbl_alumni',
            'nik' => 'required|unique:tbl_alumni',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:tbl_alumni',
            'password' => 'required|min:6',
            'id_tahun_lulus' => 'required|exists:tbl_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
        ]);

        try {
            // Simpan data alumni
            $alumni = Alumni::create([
                'nisn' => $request->nisn,
                'nik' => $request->nik,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'akun_fb' => $request->akun_fb,
                'akun_ig' => $request->akun_ig,
                'akun_tiktok' => $request->akun_tiktok,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password
                'status_login' => '0', // Set initial status
                'id_tahun_lulus' => $request->id_tahun_lulus,
                'id_konsentrasi_keahlian' => $request->id_konsentrasi_keahlian,
                'id_status_alumni' => $request->id_status_alumni,
            ]);

            return redirect('/');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error while storing alumni data: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data alumni.']);
        }
    }

    public function edit($id_alumni)
    {
        $alumni = Alumni::findOrFail($id_alumni);
        $statuses = StatusAlumni::all();
        $years = TahunLulus::all();
        $concentrations = KonsentrasiKeahlian::all();

        return view('admin.alumni.edit', compact('alumni', 'statuses', 'years', 'concentrations'));
    }

    public function update(Request $request, $id_alumni)
    {
        Log::info('Data received for update:', $request->all());

        $alumni = Alumni::findOrFail($id_alumni);
        $updated = $alumni->update($request->all());

        if ($updated) {
            Log::info('Alumni updated successfully', ['id_alumni' => $id_alumni]);
        } else {
            Log::error('Failed to update alumni', ['id_alumni' => $id_alumni]);
        }

        return redirect()->route('admin.alumni.index');
    }


    public function destroy(Alumni $alumni)
    {
        try {
            $alumni->delete();
            return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error while deleting alumni data: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data alumni.']);
        }
    }
}
