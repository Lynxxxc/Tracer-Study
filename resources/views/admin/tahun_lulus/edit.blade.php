@extends('admin.layouts')

@section('title', 'Edit Tahun Lulus')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Tahun Lulus</h1>

        <form action="{{ route('admin.tahun_lulus.update', $year->id_tahun_lulus) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tahun_lulus" class="block font-bold">Tahun Lulus</label>
                <input type="text" name="tahun_lulus" id="tahun_lulus" class="border px-4 py-2 w-full"
                    value="{{ old('tahun_lulus', $year->tahun_lulus) }}">
                @error('tahun_lulus')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block font-bold">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="border px-4 py-2 w-full"
                    value="{{ old('keterangan', $year->keterangan) }}">
                @error('keterangan')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
