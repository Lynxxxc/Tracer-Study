<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Testimoni</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

    <!-- Header -->
    <header class="sticky top-0 z-50 flex justify-between items-center py-5 px-6 bg-blue-600 text-white shadow-md">
        <h1 class="text-3xl font-extrabold">Tracer Study SmartOne</h1>
        <a href="{{ route('logout') }}"
            class="px-4 py-2 rounded-full bg-blue-700 hover:bg-blue-800 text-white transition duration-300"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </header>

    <!-- Form Tambah Testimoni -->
    <main class="flex justify-center items-center flex-grow bg-gradient-to-r from-blue-50 to-blue-100">
        <div class="w-full max-w-3xl p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h1 class="text-4xl font-extrabold text-blue-600 text-center mb-6">Tambah Testimoni</h1>

            <form action="{{ route('testimoni.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Testimoni -->
                <div>
                    <label for="testimoni" class="block text-gray-700 font-medium mb-2">Testimoni</label>
                    <textarea name="testimoni" id="testimoni" rows="6"
                        class="w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis testimoni Anda di sini..." required></textarea>
                    @error('testimoni')
                        <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Kembali -->
                <div class="flex justify-between">
                    <a href="{{ route('alumni.dashboard') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 transition duration-300 transform hover:scale-105">
                        Kembali ke Dashboard
                    </a>

                    <!-- Tombol Simpan -->
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                        Simpan Testimoni
                    </button>
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
