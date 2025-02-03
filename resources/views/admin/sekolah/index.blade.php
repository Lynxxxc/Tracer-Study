@extends('admin.layouts')

@section('title', 'Daftar Sekolah')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <!-- Header -->
            <div
                class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-t-lg px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Daftar Sekolah</h1>
            </div>

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
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">#</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">NPSN</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">NSS</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Nama Sekolah</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Alamat</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">No Telepon</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Website</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Email</th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($sekolahs as $sekolah)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->npsn }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->nss }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->nama_sekolah }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->alamat }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->no_telp }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->website }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $sekolah->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex space-x-4">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.sekolah.edit', $sekolah->id_sekolah) }}"
                                            class="inline-flex items-center bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-yellow-600 transition duration-300">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
