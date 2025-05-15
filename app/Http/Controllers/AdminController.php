<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;


class AdminController extends Controller
{
    // Display the admin dashboard or some admin page
    public function index()
    {
        return view('admin.dashboard');
    }
    public function showRequests()
    {
        $universities = University::where('status', 'pending')->get();
        return view('admin.requests', compact('universities'));
    }


    // Example: Show a form to create a new university
    public function create()
    {
        return view('admin.create');
    }

    // Example: Store a newly created university
    public function store(Request $request)
    {
        // Logic to store the university
    }
    public function showPendingUniversities()
{
    $pendingUniversities = University::where('status', 'pending')->get();
    return view('admin.pending_universities', compact('pendingUniversities'));
}
public function approve($universityId)
    {
        $university = University::findOrFail($universityId);
        $university->status = 'approved';
        $university->save();

        return redirect()->route('admin.requests')->with('success', 'University approved successfully!');
    }

    public function deny($universityId)
    {
        $university = University::findOrFail($universityId);
        $university->status = 'denied';
        $university->save();

        return redirect()->route('admin.requests')->with('error', 'University denied.');
    }
}
