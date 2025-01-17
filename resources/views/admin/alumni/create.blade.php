@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Alumni</h1>

            <form action="{{ route('admin.alumni.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Tahun Lulus -->
                <div class="mb-4">
                    <label for="id_tahun_lulus" class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                    <select name="id_tahun_lulus" id="id_tahun_lulus" class="input w-full" required>
                        @foreach ($years as $year)
                            <option value="{{ $year->id_tahun_lulus }}">{{ $year->tahun_lulus }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Alumni -->
                <div class="mb-4">
                    <label for="id_status_alumni" class="block text-sm font-medium text-gray-700">Status Alumni</label>
                    <select name="id_status_alumni" id="id_status_alumni" class="input w-full" required>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Konsentrasi Keahlian -->
                <div class="mb-4">
                    <label for="id_konsentrasi_keahlian" class="block text-sm font-medium text-gray-700">Konsentrasi
                        Keahlian</label>
                    <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="input w-full" required>
                        @foreach ($concentrations as $concentration)
                            <option value="{{ $concentration->id_konsentrasi_keahlian }}">
                                {{ $concentration->konsentrasi_keahlian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- NISN -->
                <div class="mb-4">
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="input w-full" required>
                </div>

                <!-- NIK -->
                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" id="nik" class="input w-full" required>
                </div>

                <!-- Nama Depan -->
                <div class="mb-4">
                    <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan" class="input w-full" required>
                </div>

                <!-- Nama Belakang -->
                <div class="mb-4">
                    <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" class="input w-full" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="input w-full" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="input w-full" required>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-4">
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="input w-full" required>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" class="input w-full" required></textarea>
                </div>

                <!-- Nomor HP -->
                <div class="mb-4">
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="input w-full" required>
                </div>

                <!-- Akun Facebook -->
                <div class="mb-4">
                    <label for="akun_fb" class="block text-sm font-medium text-gray-700">Akun Facebook</label>
                    <input type="text" name="akun_fb" id="akun_fb" class="input w-full">
                </div>

                <!-- Akun Instagram -->
                <div class="mb-4">
                    <label for="akun_ig" class="block text-sm font-medium text-gray-700">Akun Instagram</label>
                    <input type="text" name="akun_ig" id="akun_ig" class="input w-full">
                </div>

                <!-- Akun TikTok -->
                <div class="mb-4">
                    <label for="akun_tiktok" class="block text-sm font-medium text-gray-700">Akun TikTok</label>
                    <input type="text" name="akun_tiktok" id="akun_tiktok" class="input w-full">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="input w-full" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="input w-full" required>
                </div>

                <!-- Status Login -->
                <div class="mb-4">
                    <label for="status_login" class="block text-sm font-medium text-gray-700">Status Login</label>
                    <select name="status_login" id="status_login" class="input w-full" required>
                        <option value="0">Belum Login</option>
                        <option value="1">Sudah Login</option>
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end items-center space-x-4">
                    <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
@endsection
