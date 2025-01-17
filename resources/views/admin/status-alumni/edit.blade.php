@extends('admin.layouts')

@section('title', 'Edit Status Alumni')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Status Alumni</h1>

        <form action="{{ route('admin.status-alumni.update', $status_alumnus->id_status_alumni) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <input type="text" name="status" id="status" value="{{ $status_alumnus->status }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
