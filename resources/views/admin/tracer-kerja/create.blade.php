@extends('admin.layouts')

@section('title', 'Tambah Data Tracer Kerja')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Data Tracer Kerja</h1>

        <form action="{{ route('admin.tracer-kerja.store') }}" method="POST">
            @csrf

            <!-- Alumni -->
            <div class="mb-6">
                <label for="id_alumni" class="block text-lg font-medium mb-2">Nama Alumni</label>
                <select name="id_alumni" id="id_alumni" class="w-full border border-gray-300 rounded-lg p-3" required>
                    <option value="">-- Pilih Alumni --</option>
                    @foreach ($alumni as $item)
                        <option value="{{ $item->id_alumni }}">{{ $item->nama_depan }} {{ $item->nama_belakang }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pekerjaan -->
            <div class="mb-6">
                <label for="tracer_kerja_pekerjaan" class="block text-lg font-medium mb-2">Pekerjaan</label>
                <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Nama Perusahaan -->
            <div class="mb-6">
                <label for="tracer_kerja_nama" class="block text-lg font-medium mb-2">Nama Perusahaan</label>
                <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Jabatan -->
            <div class="mb-6">
                <label for="tracer_kerja_jabatan" class="block text-lg font-medium mb-2">Jabatan</label>
                <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="tracer_kerja_status" class="block text-lg font-medium mb-2">Status Pekerjaan</label>
                <input type="text" name="tracer_kerja_status" id="tracer_kerja_status"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Lokasi -->
            <div class="mb-6">
                <label for="tracer_kerja_lokasi" class="block text-lg font-medium mb-2">Lokasi Pekerjaan</label>
                <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Alamat Perusahaan -->
            <div class="mb-6">
                <label for="tracer_kerja_alamat" class="block text-lg font-medium mb-2">Alamat Perusahaan</label>
                <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-6">
                <label for="tracer_kerja_tgl_mulai" class="block text-lg font-medium mb-2">Tanggal Mulai Bekerja</label>
                <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai"
                    class="w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <!-- Gaji -->
            <div class="mb-6">
                <label for="tracer_kerja_gaji" class="block text-lg font-medium mb-2">Gaji</label>
                <input type="text" name="tracer_kerja_gaji" id="tracer_kerja_gaji"
                    class="w-full border border-gray-300 rounded-lg p-3">
            </div>

            <!-- Submit Buttons -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                    Simpan
                </button>
                <a href="{{ route('admin.tracer-kerja.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
