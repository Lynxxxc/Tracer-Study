<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    @vite('resources/css/app.css')
    <style>
        /* Pastikan html dan body memiliki tinggi penuh */
        html,
        body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }

        /* Memastikan sidebar dan konten utama bisa di-scroll */
        .side-menu {
            overflow-y: auto;
        }

        .content {
            overflow-y: auto;
            height: 100%;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Menu -->
        <div class="side-menu bg-gray-800 text-white p-6 flex flex-col w-64 h-screen space-y-4 md:block sm:hidden">
            <div class="mb-8">
                <h4 class="text-white text-xl font-semibold">Dashboard</h4>
                <p class="text-gray-400 text-sm">Admin Panel</p>
            </div>
            <nav class="flex-1 space-y-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/dashboard') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.bidang-keahlian.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/bidang-keahlian*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-gear me-2"></i> Bidang Keahlian
                </a>
                <a href="{{ route('admin.program-keahlian.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/program-keahlian*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-code-slash me-2"></i> Program Keahlian
                </a>
                <a href="{{ route('admin.konsentrasi-keahlian.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/konsentrasi-keahlian*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-braces me-2"></i> Konsentrasi Keahlian
                </a>
                <a href="{{ route('admin.alumni.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600">
                    <i class="bi bi-person-circle me-2"></i> Alumni
                </a>
                <a href="{{ route('admin.tahun_lulus.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/tahun-lulus*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-calendar3 me-2"></i> Tahun Lulus
                </a>
                <a href="{{ route('admin.status-alumni.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/status-alumni*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-info-circle me-2"></i> Status Alumni
                </a>
                <a href="{{ route('admin.tracer-kuliah.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600">
                    <i class="bi bi-graph-up-arrow me-2"></i> Tracer Kuliah
                </a>
                <a href="{{ route('admin.tracer-kerja.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600">
                    <i class="bi bi-graph-down-arrow me-2"></i> Tracer Kerja
                </a>
                <a href="{{ route('admin.testimoni.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600">
                    <i class="bi bi-chat-square-text me-2"></i> Testimoni
                </a>
                <a href="{{ route('admin.sekolah.index') }}"
                    class="flex items-center px-4 py-2 rounded-md text-white hover:bg-blue-600 {{ Request::is('admin/sekolah*') ? 'bg-blue-700' : '' }}">
                    <i class="bi bi-building me-2"></i> Sekolah
                </a>

            </nav>
        </div>

        <!-- Main Content -->
        <div class="content flex-1 p-8 md:ml-6">
            <!-- Hamburger Button for Mobile -->
            <div class="md:hidden flex items-center justify-between">
                <button id="menu-toggle" class="text-gray-600 hover:text-gray-800">
                    <i class="bi bi-list text-3xl"></i>
                </button>
            </div>

            @yield('content')
        </div>
    </div>

    <script>
        // Toggle sidebar for small screens
        const menuToggle = document.getElementById('menu-toggle');
        const sideMenu = document.querySelector('.side-menu');

        menuToggle.addEventListener('click', () => {
            sideMenu.classList.toggle('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqtuK3SO0OImq1C4wBfMtrxtUB7tWlaP4H5q9p+6eS2tK7" crossorigin="anonymous">
    </script>
</body>

</html>
