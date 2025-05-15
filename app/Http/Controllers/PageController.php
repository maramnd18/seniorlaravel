<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page()
    {
        return view('page');
    }

    public function home()
    {
        return view('home');
    }

    public function aboutUs()
    {
        return view('aboutus');
    }

    public function login()
    {
        return view('login');
    }

    public function index()
    {
        $universities = university::all();
        return view('home', compact('universities'));
    }

    public function create()
    {
        return view('create');
    }

    public function show(University $university)
    {
        return view('show', compact('university'));
    }

    public function edit(university $university)
    {
        return view('edit', compact('university'));
    }

    public function update(Request $request, university $university)
    {
        $validatedData = $request->validate([
            'UniName' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $university->update($validatedData);

        return redirect()->route('home', ['university' => $university->id])
            ->with('success', 'University updated successfully!');
    }

    public function destroy($id)
    {
        $university = University::findOrFail($id);

        $university->delete();

        return redirect()->route('home')->with('success', 'University deleted successfully');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'founded_year' => 'required|date',
            'website' => 'required|max:50|url', // Optional: you can add the URL validation
        ]);

        // Create a new university record
        University::create([
            'name' => $validatedData['name'],
            'founded_year' => $validatedData['founded_year'],
            'website' => $validatedData['website'],
        ]);

        // Redirect back with a success message
        return redirect()->route('home')->with('success', 'University added successfully!');
    }
}
