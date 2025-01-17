@extends('admin.layouts')

@section('title', 'Create New Status Alumni')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create New Status Alumni</h1>

        <form action="{{ route('admin.status-alumni.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <input type="text" name="status" id="status" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
        </form>
    </div>
@endsection
