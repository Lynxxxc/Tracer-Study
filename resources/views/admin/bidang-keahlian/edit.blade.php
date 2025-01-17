@extends('admin.layouts')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Edit Bidang Keahlian</h1>
            <p class="text-gray-600 mb-6">Silakan ubah informasi bidang keahlian di bawah ini dan klik tombol
                <strong>Perbarui</strong> untuk menyimpan perubahan.</p>

            <form action="{{ route('admin.bidang-keahlian.update', $bidangKeahlian->id_bidang_keahlian) }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="kode_bidang_keahlian" class="block text-sm font-medium text-gray-700">Kode Bidang
                        Keahlian</label>
                    <input type="text" id="kode_bidang_keahlian" name="kode_bidang_keahlian"
                        value="{{ $bidangKeahlian->kode_bidang_keahlian }}"
                        class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan kode bidang keahlian" required>
                </div>

                <div>
                    <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700">Nama Bidang
                        Keahlian</label>
                    <input type="text" id="bidang_keahlian" name="bidang_keahlian"
                        value="{{ $bidangKeahlian->bidang_keahlian }}"
                        class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama bidang keahlian" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200 shadow-md">
                        <i class="fas fa-save mr-2"></i>Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
