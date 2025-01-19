<!DOCTYPE html>
<html lang="en">

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
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </header>

    <!-- Main Section: Data Diri -->
    <main class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-4xl font-extrabold text-blue-600 text-center mb-8">Data Diri Anda</h2>

            <form action="{{ route('update_profile') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Depan -->
                <div>
                    <label for="first_name" class="block text-gray-700 font-medium">Nama Depan</label>
                    <input type="text" name="first_name" id="first_name"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama depan" required
                        value="{{ old('first_name', auth()->user()->first_name) }}">
                    @error('first_name')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Belakang -->
                <div>
                    <label for="last_name" class="block text-gray-700 font-medium">Nama Belakang</label>
                    <input type="text" name="last_name" id="last_name"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama belakang"
                        required value="{{ old('last_name', auth()->user()->last_name) }}">
                    @error('last_name')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                    <input type="text" name="address" id="address"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan alamat" required
                        value="{{ old('address', auth()->user()->address) }}">
                    @error('address')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="phone_number" class="block text-gray-700 font-medium">Nomor Telepon</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nomor telepon"
                        required value="{{ old('phone_number', auth()->user()->phone_number) }}">
                    @error('phone_number')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan email" required
                        value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan -->
                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                        Simpan Perubahan
                    </button>

                    @if (session('status'))
                        <div class="bg-blue-600 text-white p-4 rounded-md mb-6">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center p-6 mt-16">
        <p>&copy; 2025 Tracer Study | Semua Hak Cipta Dilindungi</p>
    </footer>

</body>

</html>
