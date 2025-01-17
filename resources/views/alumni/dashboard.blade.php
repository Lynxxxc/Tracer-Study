<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-teal-600 to-teal-800 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-5 px-6">
            <h1 class="text-3xl font-extrabold text-blue-800">Tracer Study SmartOne</h1>
            <div class="space-x-6">
                @if (Auth::check())
                    <!-- Jika pengguna sudah login -->
                    <a href="#" class="hover:text-teal-300 text-black text-lg">{{ Auth::user()->nama_depan }}</a>
                    <a href="{{ route('tracerstudy.logout') }}" class="hover:text-teal-300 text-lg text-black"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <!-- Jika pengguna belum login -->
                    <a href="tracer-study/login" class="text-black hover:text-teal-300 text-lg">LOGGG</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-purple-500 to-teal-400 text-white py-12">
        <div class="container mx-auto text-center px-6">
            <h2>Selamat Datang, {{ Auth::check() ? Auth::user()->name : 'Pengguna' }}!</h2>
            <p class="mt-4 text-xl text-blue-100">Manfaatkan fitur alumni untuk terhubung dengan jaringan yang lebih
                luas.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: Data Diri -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-blue-600 to-pink-500 text-purple p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6l4 4M6 12h12M9 9H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V11a2 2 0 00-2-2h-2" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-blue-700">Data Diri</h3>
                    <p class="text-gray-800 mt-4">Perbarui informasi diri Anda untuk tetap terhubung dengan jaringan
                        alumni kami.</p>
                    <a href="#" class="mt-4 block text-blue-600 hover:underline">Kelola Data Diri</a>
                </div>
            </div>

            <!-- Card 2: Tracer Study -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2 4 4M6 12h12M6 6h12m-6 0v12" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-indigo-700">Tracer Study</h3>
                    <p class="text-gray-800 mt-4">Isi tracer study untuk membantu kami memantau perkembangan karir dan
                        pendidikan Anda.</p>
                    <a href="{{ route('tracerstudy.form') }}" class="mt-4 block text-indigo-600 hover:underline">Isi
                        Tracer Study</a>
                </div>
            </div>

            <!-- Card 3: Testimoni -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-purple-600 to-purple-500 text-white p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 9l3 3-3 3M15 9l3 3-3 3" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-purple-700">Testimoni</h3>
                    <p class="text-gray-800 mt-4">Bagikan pengalaman Anda dan berikan testimoni untuk membantu kami
                        meningkatkan layanan.</p>
                    <a href="#" class="mt-4 block text-purple-600 hover:underline">Berikan Testimoni</a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-teal-600 to-teal-800 text-white text-center py-6">
        <p>&copy; 2025 Tracer Study. All rights reserved.</p>
    </footer>

</body>

</html>
