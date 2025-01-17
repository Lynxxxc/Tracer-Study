<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Diri - Tracer Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="sticky top-0 z-50 flex justify-between items-center p-6 bg-teal-600 text-white shadow-lg">
        <h1 class="text-3xl font-extrabold tracking-tight">Tracer Study</h1>
        <!-- Link ke Halaman Login atau Logout -->
        <a href="{{ route('logout') }}" class="bg-red-600 px-4 py-2 rounded-full hover:bg-red-700">Logout</a>
    </header>

    <!-- Main Section: Data Diri -->
    <main class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-4xl font-extrabold text-teal-600 text-center mb-8">Data Diri Anda</h2>

            <form action="{{ route('update_profile') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Depan -->
                <div>
                    <label for="first_name" class="block text-gray-700 font-medium">Nama Depan</label>
                    <input type="text" name="first_name" id="first_name"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama depan" required
                        value="{{ auth()->user()->first_name }}">
                </div>

                <!-- Nama Belakang -->
                <div>
                    <label for="last_name" class="block text-gray-700 font-medium">Nama Belakang</label>
                    <input type="text" name="last_name" id="last_name"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama belakang"
                        required value="{{ auth()->user()->last_name }}">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                    <input type="text" name="address" id="address"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan alamat" required
                        value="{{ auth()->user()->address }}">
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="phone_number" class="block text-gray-700 font-medium">Nomor Telepon</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nomor telepon"
                        required value="{{ auth()->user()->phone_number }}">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan email" required
                        value="{{ auth()->user()->email }}">
                </div>

                <!-- Tombol Simpan -->
                <div>
                    <button type="submit"
                        class="w-full py-3 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition duration-300">
                        Simpan Perubahan
                    </button>

                    @if (session('status'))
                        <div class="bg-teal-600 text-white p-4 rounded-md mb-6">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-teal-600 text-white text-center p-6 mt-16">
        <p>&copy; 2025 Tracer Study | Semua Hak Cipta Dilindungi</p>
    </footer>

</body>

</html>
