@extends('tracerstudy.layouts')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-6 text-gray-900">Detail Data Tracer Study</h2>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">NISN:</strong>
                <p>{{ $tracerStudy->nisn }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">NIK:</strong>
                <p>{{ $tracerStudy->nik }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Nama:</strong>
                <p>{{ $tracerStudy->nama_depan }} {{ $tracerStudy->nama_belakang }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Jenis Kelamin:</strong>
                <p>{{ $tracerStudy->jenis_kelamin }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Tempat Lahir:</strong>
                <p>{{ $tracerStudy->tempat_lahir }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Tanggal Lahir:</strong>
                <p>{{ \Carbon\Carbon::parse($tracerStudy->tgl_lahir)->format('d-m-Y') }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Alamat:</strong>
                <p>{{ $tracerStudy->alamat }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">No. HP:</strong>
                <p>{{ $tracerStudy->no_hp }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-sm font-medium text-gray-700">Tahun Lulus:</strong>
                <p>{{ $tracerStudy->tahun_lulus }}</p>
            </div>

            <!-- Display other fields similarly -->
        </div>
    </div>
@endsection
