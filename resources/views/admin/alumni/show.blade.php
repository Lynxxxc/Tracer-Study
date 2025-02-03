@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-t-lg px-6 py-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7H8m8 4H8m8 4H8m10 5H6a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"></path>
                </svg>
                <h1 class="text-2xl font-bold">Detail Alumni</h1>
            </div>

            <div class="p-6 space-y-4">
                <!-- Informasi Data Diri Alumni -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">NISN:</strong>
                        <p class="text-gray-900">{{ $alumni->nisn }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">NIK:</strong>
                        <p class="text-gray-900">{{ $alumni->nik }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Nama:</strong>
                        <p class="text-gray-900">{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Jenis Kelamin:</strong>
                        <p class="text-gray-900">{{ $alumni->jenis_kelamin }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Konsentrasi Keahlian:</strong>
                        <p class="text-gray-900">{{ $alumni->id_konsentrasi_keahlian }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Status Alumni:</strong>
                        <p class="text-gray-900">{{ $alumni->id_status_alumni }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Tahun Lulus:</strong>
                        <p class="text-gray-900">{{ $alumni->id_tahun_lulus }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Tempat Lahir:</strong>
                        <p class="text-gray-900">{{ $alumni->tempat_lahir }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Tanggal Lahir:</strong>
                        <p class="text-gray-900">{{ $alumni->tgl_lahir }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Alamat:</strong>
                        <p class="text-gray-900">{{ $alumni->alamat }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">No. HP:</strong>
                        <p class="text-gray-900">{{ $alumni->no_hp }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Akun Instagram:</strong>
                        <p class="text-gray-900">{{ $alumni->akun_ig }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Akun Facebook:</strong>
                        <p class="text-gray-900">{{ $alumni->akun_fb }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <strong class="text-gray-700">Akun TikTok:</strong>
                        <p class="text-gray-900">{{ $alumni->akun_tiktok }}</p>
                    </div>
                </div>

                

                <!-- Tombol Kembali -->
                <div class="mt-6 text-center">
                    <a href="{{ route('admin.alumni.index') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                        Kembali ke Daftar Alumni
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection