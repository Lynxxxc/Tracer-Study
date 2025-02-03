<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\TracerKerja;
use App\Models\StatusAlumni;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Support\Facades\Auth;
use App\Models\TracerStudy;

class TracerStudyController extends Controller
{
    // Show the user's data
    public function dataDiri()
    {
        $user = auth()->user();
        $alumni = Alumni::where('user_id', $user->id)->first();
    
        // Jika belum mengisi Tracer Study, tampilkan SweetAlert
        if (!$alumni) {
            return redirect()->route('alumni.dashboard')->with('warning','Isi Tracer Study Dulu Yaaa');
        }

        $user = auth()->user();
        $alumni = Alumni::where('user_id', $user->id)->first();
        return view('tracerstudy.data_diri', compact('alumni'));
    }

    // Handle profile updates
    public function updateProfile(Request $request)
    {
    
        $validatedData = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            
        ]);
    
        // Update data alumni
        $alumni->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'alamat' => $request->almat,
            'no_hp' => $request->no_hp,
            
        ]);
    
        return redirect()->route('tracerstudy.data_diri')->with('status', 'Data berhasil diperbarui');
    }    

    // Show the form for tracer study registration
    public function create()
    {
	$user = auth()->user();
	//cek alumni
	$alumni = Alumni::where('user_id', $user->id)->first();
	if($alumni) {
		return redirect()->route('alumni.dashboard')->with('tracer_study_filled', true);
    }
        $years = TahunLulus::all();
        $statuses = StatusAlumni::all();
        $concentrations = KonsentrasiKeahlian::all();
        
        return view('tracerstudy.register', compact('years', 'statuses', 'concentrations'));
    }

        public function checkDataDiri()
    {
        $user = auth()->user();
        $alumni = Alumni::where('user_id', $user->id)->first();

        return response()->json([
            'hasDataDiri' => $alumni ? true : false
        ]);
    }

    // Show the user data if logged in
    public function show()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        return view('tracerstudy.data_diri', compact('user'));
    }

    // Store tracer study data
        public function store(Request $request)
    {
        $user = Auth::user();  // Get the currently authenticated user

        // Check if the user has already filled out the form
        $existingTracerStudy = TracerStudy::where('id_alumni', $user->id)->first();
        if ($existingTracerStudy) {
            return redirect()->route('alumni.dashboard')->with('status', 'Anda sudah mengisi form Tracer Study.');
        }

        // Validate incoming data
        $validatedData = $request->validate([
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

            // Sosial Media fields (optional)
            'akun_ig' => 'nullable|string|max:255',
            'akun_fb' => 'nullable|string|max:255',
            'akun_tiktok' => 'nullable|string|max:255',

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

        // Save alumni data
        $alumni = Alumni::create([
            'user_id' => $user->id,  // Use the ID of the logged-in user
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
            'akun_ig' => $request->akun_ig,
            'akun_fb' => $request->akun_fb,
            'akun_tiktok' => $request->akun_tiktok,
        ]);

        // Save tracer kuliah data
        TracerKuliah::create([
            'id_alumni' => $alumni->id_alumni,  // Use the ID of the newly created alumni
            'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
            'tracer_kuliah_status' => $request->tracer_kuliah_status,
            'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
            'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
            'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
            'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
        ]);

        // Save tracer kerja data
        TracerKerja::create([
            'id_alumni' => $alumni->id_alumni,  // Use the ID of the newly created alumni
            'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
            'tracer_kerja_nama' => $request->tracer_kerja_nama,
            'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
            'tracer_kerja_status' => $request->tracer_kerja_status,
            'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
            'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
            'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
            'tracer_kerja_gaji' => $request->tracer_kerja_gaji,
        ]);

        return redirect()->route('alumni.dashboard')->with('success', 'Pendaftaran alumni berhasil!');
}  
}