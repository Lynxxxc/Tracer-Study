@extends('admin.layouts')

@section('title', 'Edit Data Tracer Kuliah')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Edit Data Tracer Kuliah</h1>

        <form action="{{ route('admin.tracer-kuliah.update', $tracer->id_tracer_kuliah) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="id_alumni" class="form-label block text-lg font-medium mb-2">Nama Alumni</label>
                <select name="id_alumni" id="id_alumni" class="form-select w-full border border-gray-300 rounded-lg p-3"
                    required>
                    <option value="">-- Pilih Alumni --</option>
                    @foreach ($alumni as $item)
                        <option value="{{ $item->id_alumni }}"
                            {{ $tracer->id_alumni == $item->id_alumni ? 'selected' : '' }}>
                            {{ $item->nama_depan }} {{ $item->nama_belakang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_kampus" class="form-label block text-lg font-medium mb-2">Kampus</label>
                <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_kampus }}" required>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_status" class="form-label block text-lg font-medium mb-2">Status</label>
                <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_status }}" required>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_jenjang" class="form-label block text-lg font-medium mb-2">Jenjang</label>
                <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_jenjang }}" required>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_jurusan" class="form-label block text-lg font-medium mb-2">Jurusan</label>
                <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_jurusan }}" required>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_linier" class="form-label block text-lg font-medium mb-2">Linier</label>
                <input type="text" name="tracer_kuliah_linier" id="tracer_kuliah_linier"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_linier }}" required>
            </div>

            <div class="mb-6">
                <label for="tracer_kuliah_alamat" class="form-label block text-lg font-medium mb-2">Alamat Kampus</label>
                <input type="text" name="tracer_kuliah_alamat" id="tracer_kuliah_alamat"
                    class="form-control w-full border border-gray-300 rounded-lg p-3"
                    value="{{ $tracer->tracer_kuliah_alamat }}" required>
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.tracer-kuliah.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
