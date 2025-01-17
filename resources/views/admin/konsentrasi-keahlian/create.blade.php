@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-xl rounded-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Tambah Konsentrasi Keahlian</h1>

            <form action="{{ route('admin.konsentrasi-keahlian.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Nama Konsentrasi Keahlian -->
                <div class="space-y-2">
                    <label for="konsentrasi_keahlian" class="block text-lg font-medium text-gray-700">Nama Konsentrasi
                        Keahlian</label>
                    <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Masukkan nama konsentrasi keahlian" required>
                </div>

                <!-- Kode Konsentrasi Keahlian -->
                <div class="space-y-2">
                    <label for="kode_konsentrasi_keahlian" class="block text-lg font-medium text-gray-700">Kode Konsentrasi
                        Keahlian</label>
                    <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Masukkan kode konsentrasi keahlian" required>
                </div>

                <!-- Program Keahlian -->
                <div class="space-y-2">
                    <label for="id_program_keahlian" class="block text-lg font-medium text-gray-700">Program
                        Keahlian</label>
                    <select name="id_program_keahlian" id="id_program_keahlian"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        required>
                        <option value="" disabled>-- Pilih Program Keahlian --</option>
                        @foreach ($programKeahlian as $program)
                            <option value="{{ $program->id_program_keahlian }}">{{ $program->program_keahlian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between items-center space-x-4">
                    <a href="{{ route('admin.konsentrasi-keahlian.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
