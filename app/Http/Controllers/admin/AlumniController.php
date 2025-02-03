<?php   

namespace App\Http\Controllers\Admin;

use App\Models\Alumni;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\TracerKuliah;  // Make sure you import the TracerKuliah model
use App\Models\TracerKerja;   // Make sure you import the TracerKerja model
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    public function index()
    {
        // Fetch all alumni with their login status and status
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
            'akun_ig' => 'nullable|string|max:255',
            'akun_fb' => 'nullable|string|max:255',
            'akun_tiktok' => 'nullable|string|max:255',
            'tracer_kuliah_kampus' => 'required|string|max:255',
            'tracer_kuliah_status' => 'required|string|max:255',
            'tracer_kuliah_jenjang' => 'required|string|max:255',
            'tracer_kuliah_jurusan' => 'required|string|max:255',
            'tracer_kuliah_linier' => 'required|string|max:255',
            'tracer_kuliah_alamat' => 'required|string|max:255',
            'tracer_kerja_pekerjaan' => 'required|string|max:255',
            'tracer_kerja_nama' => 'required|string|max:255',
            'tracer_kerja_jabatan' => 'required|string|max:255',
            'tracer_kerja_status' => 'required|string|max:255',
            'tracer_kerja_lokasi' => 'required|string|max:255',
            'tracer_kerja_alamat' => 'required|string|max:255',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|string|max:255',
        ]);

        try {
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
                'akun_ig' => $request->akun_ig,
                'akun_fb' => $request->akun_fb,
                'akun_tiktok' => $request->akun_tiktok,
            ]);

            // Save tracer kuliah data
            TracerKuliah::create([
                'id_alumni' => $alumni->id,
                'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
                'tracer_kuliah_status' => $request->tracer_kuliah_status,
                'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
                'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
                'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
                'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
            ]);

            // Save tracer kerja data
            TracerKerja::create([
                'id_alumni' => $alumni->id,
                'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
                'tracer_kerja_nama' => $request->tracer_kerja_nama,
                'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
                'tracer_kerja_status' => $request->tracer_kerja_status,
                'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
                'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
                'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
                'tracer_kerja_gaji' => $request->tracer_kerja_gaji,
            ]);

            return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan.');
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
        // Validate or specify only the fields that should be updated
        $updated = $alumni->update($request->only([
            'nisn', 'nik', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 
            'id_tahun_lulus', 'id_konsentrasi_keahlian', 'id_status_alumni', 'alamat', 'no_hp', 'akun_ig', 
            'akun_fb', 'akun_tiktok'
        ]));

        if ($updated) {
            Log::info('Alumni updated successfully', ['id_alumni' => $id_alumni]);
        } else {
            Log::error('Failed to update alumni', ['id_alumni' => $id_alumni]);
        }

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil diperbarui.');
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

    public function show($id_alumni)
    {
        $alumni = Alumni::with('status')->findOrFail($id_alumni);
        return view('admin.alumni.show', compact('alumni'));
    }
}
