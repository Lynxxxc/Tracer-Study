@extends('tracerstudy.layouts')

@section('content')
    <div class="container mx-auto py-12">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-4xl font-semibold text-center mb-8 text-gray-900">Form Pendaftaran Tracer Study</h2>

            <!-- Menampilkan Error Message jika ada error -->
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tracerstudy.store') }}" method="POST">
                @csrf
                <div class="space-y-6">

                    <!-- Alumni Data -->
                    <h3 class="text-2xl font-semibold text-gray-800">Data Alumni</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="nisn" class="text-sm font-medium text-gray-600">NISN</label>
                            <input type="text" name="nisn" id="nisn"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="nik" class="text-sm font-medium text-gray-600">NIK</label>
                            <input type="text" name="nik" id="nik"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="text-sm font-medium text-gray-600">Nama Depan</label>
                            <input type="text" name="nama_depan" id="nama_depan"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_belakang" class="text-sm font-medium text-gray-600">Nama Belakang</label>
                            <input type="text" name="nama_belakang" id="nama_belakang"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="text-sm font-medium text-gray-600">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="id_tahun_lulus" class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                            <select name="id_tahun_lulus" id="id_tahun_lulus"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                @forelse ($years as $year)
                                    <option value="{{ $year->id_tahun_lulus }}"
                                        {{ old('id_tahun_lulus') == $year->id_tahun_lulus ? 'selected' : '' }}>
                                        {{ $year->tahun_lulus }}</option>
                                @empty
                                    <option value="">Tidak ada data tahun lulus</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="konsentrasi_keahlian" class="block text-sm font-medium text-gray-700">Konsentrasi
                                Keahlian</label>
                            <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                @forelse ($concentrations as $c)
                                    <option value="{{ $c->id_konsentrasi_keahlian }}"
                                        {{ old('id_konsentrasi_keahlian') == $c->id_konsentrasi_keahlian ? 'selected' : '' }}>
                                        {{ $c->konsentrasi_keahlian }}</option>
                                @empty
                                    <option value="">Tidak ada data tahun lulus</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="id_status_alumni" class="block text-sm font-medium text-gray-700">Status
                                Alumni</label>
                            <select name="id_status_alumni" id="id_status_alumni"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                @forelse ($statuses as $s)
                                    <option value="{{ $s->id_status_alumni }}"
                                        {{ old('id_status_alumni') == $s->id_status_alumni ? 'selected' : '' }}>
                                        {{ $s->status }}</option>
                                @empty
                                    <option value="">Tidak ada data tahun lulus</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="text-sm font-medium text-gray-600">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="text-sm font-medium text-gray-600">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="text-sm font-medium text-gray-600">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="text-sm font-medium text-gray-600">No HP</label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="akun_ig" class="text-sm font-medium text-gray-600">Akun Instagram</label>
                            <input type="text" name="akun_ig" id="akun_ig"
                                class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
                        <div class="form-group">
                            <label for="akun_fb" class="text-sm font-medium text-gray-600">Akun Facebook</label>
                            <input type="text" name="akun_fb" id="akun_fb"
                                class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
                        <div class="form-group">
                            <label for="akun_tiktok" class="text-sm font-medium text-gray-600">Akun TikTok</label>
                            <input type="text" name="akun_tiktok" id="akun_tiktok"
                                class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <!-- Tracer Kuliah Data -->
                    <h3 class="text-2xl font-semibold text-gray-800 mt-8">Tracer Kuliah</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="tracer_kuliah_kampus" class="text-sm font-medium text-gray-600">Nama
                                Kampus</label>
                            <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kuliah_status" class="text-sm font-medium text-gray-600">Status
                                Kuliah</label>
                            <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kuliah_jenjang" class="text-sm font-medium text-gray-600">Jenjang
                                Pendidikan</label>
                            <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kuliah_jurusan" class="text-sm font-medium text-gray-600">Jurusan</label>
                            <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kuliah_linier" class="text-sm font-medium text-gray-600">Linier</label>
                            <input type="text" name="tracer_kuliah_linier" id="tracer_kuliah_linier"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kuliah_alamat" class="text-sm font-medium text-gray-600">Alamat
                                Kampus</label>
                            <input type="text" name="tracer_kuliah_alamat" id="tracer_kuliah_alamat"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <!-- Tracer Kerja Data -->
                    <h3 class="text-2xl font-semibold text-gray-800 mt-8">Tracer Kerja</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="tracer_kerja_pekerjaan"
                                class="text-sm font-medium text-gray-600">Pekerjaan</label>
                            <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_nama" class="text-sm font-medium text-gray-600">Nama
                                Perusahaan</label>
                            <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_jabatan" class="text-sm font-medium text-gray-600">Jabatan</label>
                            <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_status" class="text-sm font-medium text-gray-600">Status
                                Pekerjaan</label>
                            <input type="text" name="tracer_kerja_status" id="tracer_kerja_status"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_lokasi" class="text-sm font-medium text-gray-600">Lokasi
                                Kerja</label>
                            <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_alamat" class="text-sm font-medium text-gray-600">Alamat
                                Kerja</label>
                            <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_tgl_mulai" class="text-sm font-medium text-gray-600">Tanggal Mulai
                                Kerja</label>
                            <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="form-group">
                            <label for="tracer_kerja_gaji" class="text-sm font-medium text-gray-600">Gaji</label>
                            <input type="text" name="tracer_kerja_gaji" id="tracer_kerja_gaji"
                                class="w-full p-3 border border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-4 rounded-md shadow-md text-lg font-semibold hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">Daftar</button>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('alumni.dashboard') }}"
                            class="w-full bg-gray-500 text-white py-3 px-4 rounded-md shadow-md text-lg font-semibold hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 text-center">Kembali
                            ke Dashboard</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
