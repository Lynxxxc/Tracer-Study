@extends('admin.layouts')

@section('title', 'Edit Testimoni')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Edit Testimoni</h1>

        <form action="{{ route('admin.testimoni.update', $testimoni->id_testimoni) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Pilih Alumni -->
            <div class="mb-4">
                <label for="id_alumni" class="block text-gray-700 font-medium">Nama Alumni</label>
                <select name="id_alumni" id="id_alumni"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Pilih Alumni --</option>
                    @foreach ($alumni as $item)
                        <option value="{{ $item->id_alumni }}"
                            {{ $testimoni->id_alumni == $item->id_alumni ? 'selected' : '' }}>
                            {{ $item->nama_depan }} {{ $item->nama_belakang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Testimoni -->
            <div class="mb-4">
                <label for="testimoni" class="block text-gray-700 font-medium">Testimoni</label>
                <textarea name="testimoni" id="testimoni"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5"
                    required>{{ $testimoni->testimoni }}</textarea>
            </div>

            <!-- Tanggal Testimoni -->
            <div class="mb-4">
                <label for="tgl_testimoni" class="block text-gray-700 font-medium">Tanggal Testimoni</label>
                <input type="date" name="tgl_testimoni" id="tgl_testimoni"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $testimoni->tgl_testimoni->format('Y-m-d') }}" required>
            </div>

            <!-- Tombol Submit dan Kembali -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.testimoni.index') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
