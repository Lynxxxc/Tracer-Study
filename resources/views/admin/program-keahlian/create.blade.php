@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-700 mb-6">Tambah Program Keahlian</h1>

            <form action="{{ route('admin.program-keahlian.store') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Kode Program Keahlian -->
                <div>
                    <label for="kode_program_keahlian" class="block text-sm font-medium text-gray-700">
                        Kode Program Keahlian
                    </label>
                    <input type="text" name="kode_program_keahlian" id="kode_program_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan kode program keahlian" required>
                </div>

                <!-- Nama Program Keahlian -->
                <div>
                    <label for="program_keahlian" class="block text-sm font-medium text-gray-700">
                        Nama Program Keahlian
                    </label>
                    <input type="text" name="program_keahlian" id="program_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama program keahlian" required>
                </div>

                <!-- Bidang Keahlian -->
                <div>
                    <label for="id_bidang_keahlian" class="block text-sm font-medium text-gray-700">
                        Bidang Keahlian
                    </label>
                    <select name="id_bidang_keahlian" id="id_bidang_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="" disabled selected>-- Pilih Bidang Keahlian --</option>
                        @foreach ($bidangKeahlian as $b)
                            <option value="{{ $b->id_bidang_keahlian }}">{{ $b->bidang_keahlian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end items-center space-x-4">
                    <a href="{{ route('admin.program-keahlian.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
