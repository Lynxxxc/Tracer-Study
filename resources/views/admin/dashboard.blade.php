@extends('admin.layouts')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <!-- Logout Button -->
        <div class="flex justify-end mb-6">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg">
                    Logout
                </button>
            </form>
        </div>

        <div class="bg-gray-100 shadow-md rounded-lg p-8">
            <!-- Title Section -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800">Selamat Datang di Dashboard Admin</h2>
                <p class="mt-3 text-lg md:text-xl text-gray-600">
                    Kelola data sekolah, alumni, dan berbagai fitur lainnya dengan mudah.
                </p>
            </div>

            <!-- Card Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1: School Data -->
                <div
                    class="bg-blue-50 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-blue-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-700">Data Sekolah</h3>
                        <p class="text-gray-600 mt-4">Kelola data sekolah.
                        </p>
                        <a href="{{ route('admin.sekolah.index') }}" class="mt-4 block text-blue-600 hover:underline">Kelola
                            Data
                            Sekolah</a>
                    </div>
                </div>

                <!-- Card 2: Alumni -->
                <div
                    class="bg-green-50 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-green-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-green-700">Manajemen Alumni</h3>
                        <p class="text-gray-600 mt-4">Lacak detail alumni, dan status alumni.</p>
                        <a href="{{ route('admin.alumni.index') }}" class="mt-4 block text-green-600 hover:underline">Kelola
                            Alumni</a>
                    </div>
                </div>

                <!-- Card 3: Reports -->
                <div
                    class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-yellow-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-yellow-700">Testimoni</h3>
                        <p class="text-gray-600 mt-4">Lihat testimoni alumni.</p>
                        <a href="{{ route('admin.testimoni.index') }}"
                            class="mt-4 block text-green-600 hover:underline">lihat
                            Testimoni Alumni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
