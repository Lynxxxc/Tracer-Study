@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header -->
            <div
                class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-t-lg px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Daftar Alumni</h1>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-6 py-4 rounded-lg mt-4 mx-6 shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                    <thead class="bg-gray-200 border-b">
                        <tr class="text-gray-700">
                            <th class="px-6 py-4 text-left font-bold">NISN</th>
                            <th class="px-6 py-4 text-left font-bold">Nama</th>
                            <th class="px-6 py-4 text-left font-bold">Status</th>
                            <th class="px-6 py-4 text-left font-bold">Login</th>
                            <th class="px-6 py-4 text-center font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($alumni as $alumniItem)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium">{{ $alumniItem->nisn }}</td>
                                <td class="px-6 py-4 font-medium">{{ $alumniItem->nama_depan }}
                                    {{ $alumniItem->nama_belakang }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold text-white {{ $alumniItem->status->status == 'Bekerja'
                                            ? 'bg-red-500'
                                            : ($alumniItem->status->status == 'Kuliah'
                                                ? 'bg-yellow-500'
                                                : ($alumniItem->status->status == 'Menganggur'
                                                    ? 'bg-green-500'
                                                    : 'bg-gray-400')) }}">
                                        {{ $alumniItem->status->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        // $isLoggedIn = $alumniItem->user && $alumniItem->user->last_login_at && $alumniItem->user->last_login_at->diffInMinutes(now()) < 5;
                                        $isLoggedIn = $alumniItem->status_login;
                                    @endphp
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold text-white {{ $isLoggedIn ? 'bg-green-500' : 'bg-gray-400' }}">
                                        {{ $isLoggedIn ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('admin.alumni.show', $alumniItem->id_alumni) }}"
                                        class="inline-flex items-center bg-blue-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    <form action="{{ route('admin.alumni.destroy', $alumniItem->id_alumni) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus alumni ini?')"
                                            class="inline-flex items-center bg-red-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-600 transition">
                                            <i class="fas fa-trash mr-1"></i> Hapus
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
