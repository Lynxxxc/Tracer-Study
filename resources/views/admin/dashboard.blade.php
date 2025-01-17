@extends('admin.layouts')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <!-- Logout Button -->
        <div class="flex justify-end mb-4">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Logout
                </button>
            </form>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-8">
            <!-- Title Section -->
            <div class="text-center mb-8">
                <h2 class="text-4xl font-extrabold text-teal-700">Welcome to Admin Dashboard</h2>
                <p class="mt-4 text-xl text-gray-600">Manage your school data, alumni, and more from the menu on the left.
                </p>
            </div>

            <!-- Card Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1: School Data -->
                <div
                    class="bg-teal-100 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-teal-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-teal-700">School Data</h3>
                        <p class="text-gray-600 mt-4">Manage your school’s essential data like departments, programs, and
                            more.</p>
                        <a href="#" class="mt-4 block text-teal-600 hover:underline">Manage School Data</a>
                    </div>
                </div>

                <!-- Card 2: Alumni -->
                <div
                    class="bg-indigo-100 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-indigo-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-indigo-700">Alumni Management</h3>
                        <p class="text-gray-600 mt-4">Keep track of alumni details, statuses, and networking opportunities.
                        </p>
                        <a href="#" class="mt-4 block text-indigo-600 hover:underline">Manage Alumni</a>
                    </div>
                </div>

                <!-- Card 3: Reports -->
                <div
                    class="bg-purple-100 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-purple-600 text-white p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v6l4 4M6 12h12M6 6h12m-6 0v12" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-purple-700">Reports</h3>
                        <p class="text-gray-600 mt-4">View detailed reports about alumni, career progress, and more.</p>
                        <a href="#" class="mt-4 block text-purple-600 hover:underline">View Reports</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
