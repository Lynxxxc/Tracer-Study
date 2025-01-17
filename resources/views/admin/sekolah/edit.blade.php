@extends('admin.layouts')

@section('title', 'Edit Sekolah')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Edit Sekolah</h1>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Edit Sekolah -->
        <form action="{{ route('admin.sekolah.update', $sekolah->id_sekolah) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="npsn" class="block text-gray-700 font-medium">NPSN</label>
                <input type="text" id="npsn" name="npsn"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->npsn }}" required>
            </div>

            <div class="mb-4">
                <label for="nss" class="block text-gray-700 font-medium">NSS</label>
                <input type="text" id="nss" name="nss"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->nss }}" required>
            </div>

            <div class="mb-4">
                <label for="nama_sekolah" class="block text-gray-700 font-medium">Nama Sekolah</label>
                <input type="text" id="nama_sekolah" name="nama_sekolah"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->nama_sekolah }}" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->alamat }}" required>
            </div>

            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 font-medium">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->no_telp }}" required>
            </div>

            <div class="mb-4">
                <label for="website" class="block text-gray-700 font-medium">Website</label>
                <input type="text" id="website" name="website"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->website }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $sekolah->email }}">
            </div>

            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection
