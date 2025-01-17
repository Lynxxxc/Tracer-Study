@extends('tracerstudy.layouts')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-6 text-gray-900">Formulir Pendaftaran Alumni</h2>

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

                    <div class="mb-4">
                        <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                        <input type="text" id="nisn" name="nisn"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('nisn') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" id="nik" name="nik"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('nik') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                        <input type="text" id="nama_depan" name="nama_depan"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('nama_depan') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                        <input type="text" id="nama_belakang" name="nama_belakang"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('nama_belakang') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tempat_lahir') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tgl_lahir') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('alamat') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('no_hp') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
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

                    <!-- Existing fields -->
                    <!-- [Insert existing fields here] -->

                    <!-- Tracer Kuliah Fields -->
                    <div class="mb-4">
                        <label for="tracer_kuliah_kampus" class="block text-sm font-medium text-gray-700">Kampus</label>
                        <input type="text" id="tracer_kuliah_kampus" name="tracer_kuliah_kampus"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_kampus') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kuliah_status" class="block text-sm font-medium text-gray-700">Status
                            Kuliah</label>
                        <input type="text" id="tracer_kuliah_status" name="tracer_kuliah_status"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_status') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kuliah_jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
                        <input type="text" id="tracer_kuliah_jenjang" name="tracer_kuliah_jenjang"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_jenjang') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kuliah_jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <input type="text" id="tracer_kuliah_jurusan" name="tracer_kuliah_jurusan"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_jurusan') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kuliah_linier" class="block text-sm font-medium text-gray-700">Linier dengan
                            Jurusan</label>
                        <input type="text" id="tracer_kuliah_linier" name="tracer_kuliah_linier"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_linier') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kuliah_alamat" class="block text-sm font-medium text-gray-700">Alamat
                            Kampus</label>
                        <input type="text" id="tracer_kuliah_alamat" name="tracer_kuliah_alamat"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kuliah_alamat') }}" required>
                    </div>

                    <!-- Tracer Kerja Fields -->
                    <div class="mb-4">
                        <label for="tracer_kerja_pekerjaan"
                            class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" id="tracer_kerja_pekerjaan" name="tracer_kerja_pekerjaan"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_pekerjaan') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_nama" class="block text-sm font-medium text-gray-700">Nama
                            Perusahaan</label>
                        <input type="text" id="tracer_kerja_nama" name="tracer_kerja_nama"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_nama') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input type="text" id="tracer_kerja_jabatan" name="tracer_kerja_jabatan"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_jabatan') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_status" class="block text-sm font-medium text-gray-700">Status
                            Kerja</label>
                        <input type="text" id="tracer_kerja_status" name="tracer_kerja_status"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_status') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_lokasi" class="block text-sm font-medium text-gray-700">Lokasi
                            Kerja</label>
                        <input type="text" id="tracer_kerja_lokasi" name="tracer_kerja_lokasi"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_lokasi') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_alamat" class="block text-sm font-medium text-gray-700">Alamat
                            Kerja</label>
                        <input type="text" id="tracer_kerja_alamat" name="tracer_kerja_alamat"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_alamat') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_tgl_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai
                            Kerja</label>
                        <input type="date" id="tracer_kerja_tgl_mulai" name="tracer_kerja_tgl_mulai"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_tgl_mulai') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tracer_kerja_gaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                        <input type="text" id="tracer_kerja_gaji" name="tracer_kerja_gaji"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('tracer_kerja_gaji') }}" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-6 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition duration-200">Daftar
                        Alumni</button>
                </div>
            </form>
        </div>
    </div>
@endsection
