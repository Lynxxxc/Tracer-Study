@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Tambah Bidang Keahlian</h1>

        <form action="{{ route('admin.bidang-keahlian.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="kode_bidang_keahlian" class="block text-sm font-medium text-gray-700">Kode Bidang Keahlian</label>
                <input type="text" id="kode_bidang_keahlian" name="kode_bidang_keahlian"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700">Nama Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Simpan</button>
        </form>
    </div>
@endsection
