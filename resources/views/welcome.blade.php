<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Welcome - Tracer Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="sticky top-0 z-50 flex justify-between items-center p-6 bg-teal-600 text-white shadow-lg">
        <h1 class="text-3xl font-extrabold tracking-tight">
            Tracer Study
        </h1>
    </header>

    <!-- Main Section: Welcome -->
    <main class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-teal-600 mb-4">Selamat Datang di Tracer Study</h2>
            <p class="text-lg text-gray-600 mb-8">SMK ANTARTIKA 1 SIDOARJO</p>
            <div class="mt-6 flex justify-center gap-6">
                <!-- Button Daftar (Register) -->
                <a href="{{ route('register') }}"
                    class="bg-teal-600 text-white px-8 py-3 rounded-full shadow-lg hover:bg-teal-700 transition duration-300">
                    Daftar
                </a>

                <!-- Button Login -->
                <a href="{{ route('login') }}"
                    class="bg-teal-600 text-white px-8 py-3 rounded-full shadow-lg hover:bg-teal-700 transition duration-300">
                    Login
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-teal-600 text-white text-center p-6 mt-16">
        <p>&copy; 2025 Tracer Study | Semua Hak Cipta Dilindungi</p>
    </footer>

</body>

</html>
