@extends('admin.layouts')

@section('title', 'Tambah Data Tracer Kuliah')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Data Tracer Kuliah</h1>

        <form action="{{ route('admin.tracer-kuliah.store') }}" method="POST">
            @csrf

            <!-- Pilih Alumni -->
            <div class="mb-4">
                <label for="id_alumni" class="block text-gray-700 font-medium">Nama Alumni</label>
                <select name="id_alumni" id="id_alumni"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Pilih Alumni --</option>
                    @foreach ($alumni as $item)
                        <option value="{{ $item->id_alumni }}">{{ $item->nama_depan }} {{ $item->nama_belakang }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kampus -->
            <div class="mb-4">
                <label for="tracer_kuliah_kampus" class="block text-gray-700 font-medium">Kampus</label>
                <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="tracer_kuliah_status" class="block text-gray-700 font-medium">Status</label>
                <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jenjang -->
            <div class="mb-4">
                <label for="tracer_kuliah_jenjang" class="block text-gray-700 font-medium">Jenjang</label>
                <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jurusan -->
            <div class="mb-4">
                <label for="tracer_kuliah_jurusan" class="block text-gray-700 font-medium">Jurusan</label>
                <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Linier -->
            <div class="mb-4">
                <label for="tracer_kuliah_linier" class="block text-gray-700 font-medium">Linier</label>
                <input type="text" name="tracer_kuliah_linier" id="tracer_kuliah_linier"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Alamat Kampus -->
            <div class="mb-4">
                <label for="tracer_kuliah_alamat" class="block text-gray-700 font-medium">Alamat Kampus</label>
                <input type="text" name="tracer_kuliah_alamat" id="tracer_kuliah_alamat"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tombol Submit dan Kembali -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan
                </button>
                <a href="{{ route('admin.tracer-kuliah.index') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
