<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-semibold">Tracer Study</h1>
        </div>
    </header>

    <main class="container mx-auto py-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} Tracer Study | Semua Hak Cipta Dilindungi</p>
    </footer>
</body>

</html>
