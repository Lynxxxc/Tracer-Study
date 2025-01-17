@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-700 mb-6">Edit Konsentrasi Keahlian</h1>

            <form action="{{ route('admin.konsentrasi-keahlian.update', $konsentrasiKeahlian->id_konsentrasi_keahlian) }}"
                method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Konsentrasi Keahlian -->
                <div>
                    <label for="konsentrasi_keahlian" class="block text-sm font-medium text-gray-700">Nama Konsentrasi
                        Keahlian</label>
                    <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('konsentrasi_keahlian', $konsentrasiKeahlian->konsentrasi_keahlian) }}" required>
                </div>

                <!-- Kode Konsentrasi Keahlian -->
                <div>
                    <label for="kode_konsentrasi_keahlian" class="block text-sm font-medium text-gray-700">Kode Konsentrasi
                        Keahlian</label>
                    <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('kode_konsentrasi_keahlian', $konsentrasiKeahlian->kode_konsentrasi_keahlian) }}"
                        required>
                </div>

                <!-- Program Keahlian -->
                <div>
                    <label for="id_program_keahlian" class="block text-sm font-medium text-gray-700">Program
                        Keahlian</label>
                    <select name="id_program_keahlian" id="id_program_keahlian"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="" disabled>-- Pilih Program Keahlian --</option>
                        @foreach ($programKeahlian as $program)
                            <option value="{{ $program->id_program_keahlian }}"
                                {{ $konsentrasiKeahlian->id_program_keahlian == $program->id_program_keahlian ? 'selected' : '' }}>
                                {{ $program->program_keahlian }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end items-center space-x-4">
                    <a href="{{ route('admin.konsentrasi-keahlian.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
