@extends('admin.layouts')

@section('title', 'Tambah Sekolah')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Sekolah</h1>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah Sekolah -->
        <form action="{{ route('admin.sekolah.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="npsn" class="block text-gray-700 font-medium">NPSN</label>
                <input type="text" name="npsn" id="npsn"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="nss" class="block text-gray-700 font-medium">NSS</label>
                <input type="text" name="nss" id="nss"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="nama_sekolah" class="block text-gray-700 font-medium">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 font-medium">No. Telp</label>
                <input type="text" name="no_telp" id="no_telp"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="website" class="block text-gray-700 font-medium">Website</label>
                <input type="text" name="website" id="website"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Tambah Sekolah
            </button>
        </form>
    </div>
@endsection
