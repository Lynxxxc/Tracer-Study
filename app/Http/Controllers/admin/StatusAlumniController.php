<?php

namespace App\Http\Controllers\Admin;

use App\Models\StatusAlumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusAlumniController extends Controller
{
    public function index()
    {
        // Retrieve all status alumni from the database
        $statuses = StatusAlumni::all();
        return view('admin.status-alumni.index', compact('statuses'));
    }

    public function create()
    {
        // Return a view to create a new status alumni
        return view('admin.status-alumni.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        // Create a new status alumni
        StatusAlumni::create([
            'status' => $request->status,
        ]);

        // Redirect back to the index with a success message
        return redirect()->route('admin.status-alumni.index')->with('success', 'Status alumni created successfully.');
    }

    public function edit(StatusAlumni $status_alumnus)
    {
        return view('admin.status-alumni.edit', compact('status_alumnus'));
    }

    public function update(Request $request, StatusAlumni $status_alumnus)
    {
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        $status_alumnus->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.status-alumni.index')->with('success', 'Status alumni updated successfully.');
    }

    public function destroy(StatusAlumni $status_alumnus)
    {
        $status_alumnus->delete();

        return redirect()->route('admin.status-alumni.index')->with('success', 'Status alumni deleted successfully.');
    }
}
