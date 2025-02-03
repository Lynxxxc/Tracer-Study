<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Menambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-teal-600 to-teal-800 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-5 px-6">
            <h1 class="text-3xl font-extrabold text-blue-800">Tracer Study SmartOne</h1>
            <div class="space-x-6">
                @if (Auth::check())
                    <a href="#" class="hover:text-teal-300 text-black text-lg">{{ Auth::user()->nama_depan }}</a>
                    <a href="{{ route('logout') }}" class="hover:text-teal-300 text-lg text-black"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-black hover:text-teal-300 text-lg">LOGIN</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-500 to-blue-400 text-white py-16">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-5xl font-extrabold leading-tight">Selamat Datang,
                {{ Auth::check() ? Auth::user()->name : 'Pengguna' }}!</h1>
            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">Manfaatkan fitur alumni untuk terhubung dengan
                jaringan yang lebih luas, memberikan testimoni, dan memperbaharui informasi diri Anda.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded-md my-4">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: Data Diri -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transition-all transform hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6l4 4M6 12h12M9 9H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V11a2 2 0 00-2-2h-2" />
                    </svg>
                </div>
                <div class="p-10">
                    <h3 class="text-2xl font-semibold text-blue-700">Data Diri</h3>
                    <p class="text-gray-800 mt-4">Perbarui informasi diri Anda untuk tetap terhubung dengan jaringan
                        alumni kami.</p>
                    <a href="{{ route('tracerstudy.data-diri') }}" onclick="checkLogin(event)">
                        <button
                            class="mt-4 w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                            Update Data Diri
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 2: Tracer Study -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transition-all transform hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2 4 4M6 12h12M6 6h12m-6 0v12" />
                    </svg>
                </div>
                <div class="p-10">
                    <h3 class="text-2xl font-semibold text-indigo-700">Tracer Study</h3>
                    <p class="text-gray-800 mt-4">Isi tracer study untuk membantu kami memantau perkembangan karir dan
                        pendidikan Anda.</p>
                    <a href="{{ route('tracerstudy.form') }}" onclick="checkLogin(event)">
                        <button
                            class="mt-4 w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105">
                            Isi Tracer Study
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 3: Testimoni -->
            <div
                class="bg-white shadow-xl rounded-xl overflow-hidden transition-all transform hover:scale-105 hover:shadow-2xl">
                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 flex items-center justify-center h-48">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 9l3 3-3 3M15 9l3 3-3 3" />
                    </svg>
                </div>
                <div class="p-10">
                    <h3 class="text-2xl font-semibold text-purple-700">Testimoni</h3>
                    <p class="text-gray-800 mt-4">Bagikan pengalaman Anda dan berikan testimoni untuk membantu kami
                        meningkatkan layanan.</p>
                    <a href="{{ route('testimoni.create') }}" onclick="checkLogin(event)">
                        <button
                            class="mt-4 w-full py-2 px-4 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300 transform hover:scale-105">
                            Berikan Testimoni
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <script>
            function checkLogin(event) {
                @if (!Auth::check())
                    event.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Anda harus login terlebih dahulu untuk mengakses fitur ini!',
                        confirmButtonText: 'Login Sekarang'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('login') }}';
                        }
                    });
                @endif
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('tracer_study_filled'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Terima Kasih!',
                        text: 'Anda sudah mengisi Tracer Study. Terima kasih atas partisipasi Anda!',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('warning'))
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: "{{ session('warning') }}",
                        confirmButtonText: 'Isi Data Diri'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('tracerstudy.form') }}";
                        }
                    });
                @endif
            });
        </script>

    </main>

    <!-- Testimoni Section -->
    <section class="mt-4 mb-8">
        <div class="mx-auto" style="max-width: var(--section-width, 1200px);"> <!-- Pembungkus untuk lebar dinamis -->
            <h2 class="text-3xl font-semibold text-center text-purple-700 mb-6">Testimoni Alumni</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($testimonis as $testimoni)
                    <div
                        class="bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                        <div
                            class="bg-gradient-to-r from-purple-600 to-purple-500 text-white py-3 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 9l3 3-3 3M15 9l3 3-3 3" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-purple-700">{{ $testimoni->alumni->nama_depan }}
                                {{ $testimoni->alumni->nama_belakang }}</h3>
                            <p class="text-gray-600 mt-2 text-sm leading-relaxed">{{ $testimoni->testimoni }}</p>
                            <p class="mt-3 text-gray-400 text-xs">Testimoni tanggal:
                                {{ $testimoni->tgl_testimoni->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-700 via-indigo-800 to-blue-600 text-white py-12">
        <div class="container mx-auto px-6">
            <!-- Grid Layout with proper spacing and alignment -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">
                <!-- Kolom 1: Tentang -->
                <div class="text-center sm:text-left">
                    <h3 class="text-lg font-semibold mb-4">Tentang Tracer Study</h3>
                    <p class="text-sm text-gray-300">
                        Tracer Study SmartOne bertujuan untuk mendukung para alumni tetap terhubung dan memantau
                        perkembangan karir serta pendidikan.
                    </p>
                </div>

                <!-- Kolom 2: Link Cepat (Updated) -->
                <div class="px-2">
                    <h3 class="text-lg font-semibold mb-2">Tentang Kami</h3>
                    <ul class="text-gray-300 text-xs space-y-1">
                        <li class="flex justify">
                            <strong>Nama Sekolah: {{ $sekolah->nama_sekolah }}</strong>
                        </li>
                        <li class="flex justify">
                            <strong>NPSN: {{ $sekolah->npsn }}</strong>
                        </li>
                        <li class="flex justify">
                            <strong>NSS: {{ $sekolah->nss }}</strong>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3: Google Maps -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Lokasi Kami</h3>
                    <div class="w-full rounded-lg overflow-hidden shadow-lg">
                        <iframe class="w-full aspect-[16/9] sm:aspect-[4/3] rounded-lg"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.288341482895!2d112.72842607538239!3d-7.433311392577457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6a663d94b21%3A0x3a57baa5fb4760ce!2sSMK%20Antartika%201%20Sidoarjo!5e0!3m2!1sen!2sid!4v1738303023954!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Kolom 4: Hubungi Kami & Ikuti Kami -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>Email: <a href="mailto:smks.antartika1.sda@gmail.com"
                                class="hover:text-blue-400">{{ $sekolah->email }}</a></li>
                        <li>WhatsApp:
                            <a href="https://wa.me/+62{{ substr($sekolah->no_telp, 1) }}"
                                class="hover:text-green-400" target="_blank">
                                +62 895-3503-42211
                            </a>
                        </li>
                        <li>Alamat: {{ $sekolah->alamat }}</li>
                    </ul>

                    <!-- Ikuti Kami -->
                    <h3 class="text-md font-semibold mt-6 mb-3">Ikuti Kami</h3>
                    <div class="flex flex-wrap space-x-4">
                        <a href="https://www.youtube.com/@smkantartika1sidoarjo726" target="_blank"
                            class="flex items-center space-x-2 hover:text-red-400 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>
                            <span>YouTube</span>
                        </a>
                        <a href="https://www.tiktok.com/@smkantartika1sda" target="_blank"
                            class="flex items-center space-x-2 hover:text-purple-500 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path
                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                            </svg>
                            <span>TikTok</span>
                        </a>
                        <a href="https://www.instagram.com/smkantartika1sda/" target="_blank"
                            class="flex items-center space-x-2 hover:text-pink-400 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.432-.174 1.942-.372.527-.204.973-.478 1.417-.923a3.9 3.9 0 0 0 .923-1.417c.198-.51.332-1.09.372-1.942.038-.853.048-1.125.048-3.297 0-2.171-.01-2.444-.048-3.297-.04-.852-.174-1.432-.372-1.942a3.9 3.9 0 0 0-.923-1.417 3.9 3.9 0 0 0-1.417-.923c-.51-.198-1.09-.333-1.942-.372C10.445.01 10.172 0 8.001 0zM8 3.25a4.75 4.75 0 1 1 0 9.5 4.75 4.75 0 0 1 0-9.5z" />
                            </svg>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
