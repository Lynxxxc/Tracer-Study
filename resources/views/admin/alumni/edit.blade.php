@extends('admin.layouts')

@section('title', 'Edit Alumni')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8 text-gray-800">Edit Alumni</h1>

        <form method="POST" action="{{ route('admin.alumni.update', ['id_alumni' => $alumni->id_alumni]) }}">
            @csrf
            @method('PUT')

            <div class="bg-white shadow-lg rounded-lg p-6">
                <!-- NISN -->
                <div class="mb-6">
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" name="nisn" id="nisn"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('nisn', $alumni->nisn) }}" required>
                    @error('nisn')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- NIK -->
                <div class="mb-6">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" id="nik"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('nik', $alumni->nik) }}" required>
                    @error('nik')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Depan -->
                <div class="mb-6">
                    <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('nama_depan', $alumni->nama_depan) }}" required>
                    @error('nama_depan')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Belakang -->
                <div class="mb-6">
                    <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('nama_belakang', $alumni->nama_belakang) }}" required>
                    @error('nama_belakang')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status Alumni -->
                <div class="mb-6">
                    <label for="id_status_alumni" class="block text-sm font-medium text-gray-700">Status Alumni</label>
                    <select name="id_status_alumni" id="id_status_alumni"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        required>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id_status_alumni }}"
                                {{ old('id_status_alumni', $alumni->id_status_alumni) == $status->id_status_alumni ? 'selected' : '' }}>
                                {{ $status->status }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_status_alumni')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tahun Lulus -->
                <div class="mb-6">
                    <label for="id_tahun_lulus" class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                    <select name="id_tahun_lulus" id="id_tahun_lulus"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        required>
                        @foreach ($years as $year)
                            <option value="{{ $year->id_tahun_lulus }}"
                                {{ old('id_tahun_lulus', $alumni->id_tahun_lulus) == $year->id_tahun_lulus ? 'selected' : '' }}>
                                {{ $year->tahun_lulus }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_tahun_lulus')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Konsentrasi Keahlian -->
                <div class="mb-6">
                    <label for="id_konsentrasi_keahlian" class="block text-sm font-medium text-gray-700">Konsentrasi
                        Keahlian</label>
                    <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        required>
                        @foreach ($concentrations as $concentration)
                            <option value="{{ $concentration->id_konsentrasi_keahlian }}"
                                {{ old('id_konsentrasi_keahlian', $alumni->id_konsentrasi_keahlian) == $concentration->id_konsentrasi_keahlian ? 'selected' : '' }}>
                                {{ $concentration->konsentrasi_keahlian }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_konsentrasi_keahlian')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- No HP -->
                <div class="mb-6">
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('no_hp', $alumni->no_hp) }}" required>
                    @error('no_hp')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Akun FB, IG, TikTok -->
                <div class="mb-6">
                    <label for="akun_fb" class="block text-sm font-medium text-gray-700">Akun Facebook</label>
                    <input type="text" name="akun_fb" id="akun_fb"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('akun_fb', $alumni->akun_fb) }}">
                </div>

                <div class="mb-6">
                    <label for="akun_ig" class="block text-sm font-medium text-gray-700">Akun Instagram</label>
                    <input type="text" name="akun_ig" id="akun_ig"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('akun_ig', $alumni->akun_ig) }}">
                </div>

                <div class="mb-6">
                    <label for="akun_tiktok" class="block text-sm font-medium text-gray-700">Akun TikTok</label>
                    <input type="text" name="akun_tiktok" id="akun_tiktok"
                        class="input w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        value="{{ old('akun_tiktok', $alumni->akun_tiktok) }}">
                </div>

                <!-- Submit -->
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-600 text-white w-full p-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                        Perbarui Alumni
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
