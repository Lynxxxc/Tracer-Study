<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\TracerKerja;
use App\Models\StatusAlumni;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;
use App\Models\KonsentrasiKeahlian;

class TracerStudyController extends Controller
{
    public function create()
    {
        // Ambil data tahun lulus
        $years = TahunLulus::all();

        // Ambil data status alumni
        $statuses = StatusAlumni::all();

        // Ambil data konsentrasi keahlian
        $concentrations = KonsentrasiKeahlian::all();

        // Kirim data ke view
        return view('tracerstudy.register', compact('years', 'statuses', 'concentrations'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            // Alumni fields
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|max:10',
            'id_konsentrasi_keahlian' => 'required',
            'id_status_alumni' => 'required',
            'id_tahun_lulus' => 'required',
            'tempat_lahir' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6',

            // Tracer Kuliah fields
            'tracer_kuliah_kampus' => 'required|string|max:255',
            'tracer_kuliah_status' => 'required|string|max:255',
            'tracer_kuliah_jenjang' => 'required|string|max:255',
            'tracer_kuliah_jurusan' => 'required|string|max:255',
            'tracer_kuliah_linier' => 'required|string|max:255',
            'tracer_kuliah_alamat' => 'required|string|max:255',

            // Tracer Kerja fields
            'tracer_kerja_pekerjaan' => 'required|string|max:255',
            'tracer_kerja_nama' => 'required|string|max:255',
            'tracer_kerja_jabatan' => 'required|string|max:255',
            'tracer_kerja_status' => 'required|string|max:255',
            'tracer_kerja_lokasi' => 'required|string|max:255',
            'tracer_kerja_alamat' => 'required|string|max:255',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|string|max:255',
        ]);

        // Simpan data alumni
        $alumni = Alumni::create([
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'id_tahun_lulus' => $request->id_tahun_lulus,
            'id_konsentrasi_keahlian' => $request->id_konsentrasi_keahlian,
            'id_status_alumni' => $request->id_status_alumni,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Enkripsi password
            'status_login' => '0',
        ]);

        // Simpan data tracer kuliah
        $tracerKuliah = TracerKuliah::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
            'tracer_kuliah_status' => $request->tracer_kuliah_status,
            'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
            'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
            'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
            'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
        ]);

        // Simpan data tracer kerja
        $tracerKerja = TracerKerja::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
            'tracer_kerja_nama' => $request->tracer_kerja_nama,
            'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
            'tracer_kerja_status' => $request->tracer_kerja_status,
            'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
            'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
            'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
            'tracer_kerja_gaji' => $request->tracer_kerja_gaji,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tracerstudy.dashboard')->with('success', 'Pendaftaran alumni berhasil!');
    }
}
