<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tracer Study</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-teal-600">Loginnn</h2>
            <p class="text-center text-gray-600">Masuk untuk melanjutkan</p>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan email" required
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan password" required>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-teal-700 transition duration-300">
                    Login
                </button>
            </form>

            <p class="text-center text-gray-600">Belum punya akun? <a href="{{ route('register') }}"
                    class="text-teal-600 hover:text-teal-700">Daftar di sini</a></p>
        </div>
    </div>

</body>

</html>
