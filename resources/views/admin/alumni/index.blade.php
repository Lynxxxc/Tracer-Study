@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <!-- Header -->
            <div
                class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-t-lg px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Daftar Alumni</h1>
                <a href="{{ route('admin.alumni.create') }}"
                    class="bg-white text-blue-600 font-semibold py-2 px-5 rounded-lg shadow hover:bg-blue-100 transition duration-300">
                    Tambah Alumni
                </a>
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
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">NISN</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Nama</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Status</th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($alumni as $alumniItem)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $alumniItem->nisn }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $alumniItem->nama_depan }}
                                    {{ $alumniItem->nama_belakang }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $alumniItem->status->status }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.alumni.edit', $alumniItem->id_alumni) }}"
                                        class="inline-flex items-center bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-yellow-600 transition duration-300">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.alumni.destroy', $alumniItem->id_alumni) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-red-600 transition duration-300"
                                            onclick="return confirm('Yakin ingin menghapus alumni ini?')">
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
