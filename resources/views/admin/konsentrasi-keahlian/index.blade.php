@extends('admin.layouts')

@section('content')
    <div class="container mt-8">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <!-- Header -->
            <div
                class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-4 flex items-center justify-between rounded-t-xl">
                <h3 class="text-xl font-bold">Konsentrasi Keahlian</h3>
                <a href="{{ route('admin.konsentrasi-keahlian.create') }}"
                    class="px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg shadow hover:bg-blue-100 transition duration-300">
                    <i class="fas fa-plus-circle"></i> Tambah Konsentrasi Keahlian
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-6 py-4 rounded-lg mt-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Kode Konsentrasi</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Nama Konsentrasi</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Program Keahlian</th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($konsentrasiKeahlian as $konsentrasi)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">
                                    {{ $konsentrasi->kode_konsentrasi_keahlian }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">
                                    {{ $konsentrasi->konsentrasi_keahlian }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">
                                    {{ $konsentrasi->programKeahlian->program_keahlian }}</td>
                                <td class="px-6 py-4 text-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.konsentrasi-keahlian.edit', $konsentrasi->id_konsentrasi_keahlian) }}"
                                        class="inline-flex items-center bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-yellow-600 transition duration-300 mr-2">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form
                                        action="{{ route('admin.konsentrasi-keahlian.destroy', $konsentrasi->id_konsentrasi_keahlian) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-red-600 transition duration-300"
                                            onclick="return confirm('Yakin ingin menghapus konsentrasi ini?')">
                                            <i class="fas fa-trash mr-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
