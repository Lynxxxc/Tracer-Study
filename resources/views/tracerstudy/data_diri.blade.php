<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Diri - Tracer Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

    <!-- Header -->
    <header
        class="sticky top-0 z-50 flex justify-between items-center py-5 px-6 bg-gradient-600 text-blue-800 shadow-lg">
        <h1 class="text-3xl font-extrabold text-blue-800">Tracer Study SmartOne</h1>
        <!-- Link ke Halaman Login atau Logout -->
        <a href="{{ route('logout') }}" class="px-1 py-1 rounded-full "
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </header>

    <!-- Bagian Utama: Data Diri -->
    <main class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-4xl font-extrabold text-blue-600 text-center mb-8">Data Diri Anda</h2>

            <!-- Bagian Detail Data Diri -->
            <div class="p-6 bg-gray-100 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-600 mb-4">Detail Data Diri</h3>
                <ul class="space-y-3">
                    <li><strong>Nama Lengkap:</strong> {{ $alumni->nama_depan }}
                        {{ $alumni->nama_belakang }}</li>
                    <li><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin }}</li>
                    <li><strong>Tempat, Tanggal Lahir:</strong> {{ $alumni->tempat_lahir }},
                        {{ $alumni->tgl_lahir }}</li>
                    <li><strong>Alamat:</strong> {{ $alumni->alamat }}</li>
                    <li><strong>Nomor HP:</strong> {{ $alumni->no_hp }}</li>
                    <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                    <li><strong>Akun Facebook:</strong> {{ $alumni->akun_fb }}</li>
                    <li><strong>Akun Instagram:</strong> {{ $alumni->akun_ig }}</li>
                    <li><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok }}</li>
                </ul>
            </div>

            <!-- Form Edit Data Diri -->
            <form action="{{ route('update_profile') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Depan -->
                <div>
                    <label for="nama_depan" class="block text-gray-700 font-medium">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama depan" required
                        value="{{ old('nama_depan', auth()->user()->nama_depan) }}">
                    @error('nama_depan')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Belakang -->
                <div>
                    <label for="nama_belakang" class="block text-gray-700 font-medium">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama belakang"
                        required value="{{ old('nama_belakang', auth()->user()->nama_belakang) }}">
                    @error('nama_belakang')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan alamat" required
                        value="{{ old('alamat', auth()->user()->alamat) }}">
                    @error('alamat')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nomor HP -->
                <div>
                    <label for="no_hp" class="block text-gray-700 font-medium">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nomor HP" required
                        value="{{ old('no_hp', auth()->user()->no_hp) }}">
                    @error('no_hp')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan -->
                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            <!-- Tombol Kembali -->
            <div class="mt-6">
                <a href="{{ route('alumni.dashboard') }}"
                    class="w-full py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition duration-300 text-center block">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center p-6 mt-16">
        <p>&copy; 2025 Tracer Study | Semua Hak Cipta Dilindungi</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Jika ada session sukses (berhasil update data)
        @if(session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('status') }}",
                confirmButtonText: 'OK'
            });
        @endif

        // Jika ada session peringatan (belum mengisi Tracer Study)
        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "{{ session('warning') }}",
                confirmButtonText: 'Isi Tracer Study'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('tracerstudy.create') }}"; // Arahkan ke form Tracer Study
                }
            });
        @endif
    });
</script>

</body>

</html>
