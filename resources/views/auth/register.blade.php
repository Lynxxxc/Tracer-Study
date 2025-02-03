<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tracer Study</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-teal-600">Daftar Akun</h2>
            <form id="registerForm" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Nama</label>
                    <input type="text" name="name" id="name"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Masukkan nama" required
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

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

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full p-3 border border-gray-300 rounded-md" placeholder="Konfirmasi password" required>
                </div>

                <div class="flex justify-between items-center space-x-4">
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-teal-700 transition duration-300">
                        Daftar
                    </button>
                </div>

            </form>
            <p class="text-center text-gray-600">Sudah memiliki akun? <a href="{{ route('login') }} "
                    class="text-blue-900 hover:text-teal-700">Masuk</a></p>
        </div>
    </div>

    <script>
        // Fungsi untuk menyimpan data ke localStorage
        document.getElementById('saveButton').addEventListener('click', function() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;

            if (name && email && password && passwordConfirmation) {
                // Menyimpan data di localStorage
                localStorage.setItem('savedName', name);
                localStorage.setItem('savedEmail', email);
                localStorage.setItem('savedPassword', password);
                localStorage.setItem('savedPasswordConfirmation', passwordConfirmation);

                // Menampilkan pesan sukses
                alert('Data berhasil disimpan!');
            } else {
                alert('Harap isi semua field terlebih dahulu.');
            }
        });
    </script>

</body>

</html>
