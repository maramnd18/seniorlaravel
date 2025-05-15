<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Universities;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function create($universityId)
{
    $university = Universities::findOrFail($universityId);
    return view('faculties.create', compact('university'));
}

public function store(Request $request, $universityId)
{
    $request->validate([
        'FacultyName' => 'required|string|max:255',
        'Description' => 'required|string',
    ]);

    
    $faculty = new Faculty();
    $faculty->FacultyName = $request->FacultyName;
    $faculty->Description = $request->Description;
    $faculty->university_id = $universityId; 
    $faculty->save();

    return redirect()->route('show', $universityId); 
}
public function getAUBMajors()
{
    $json = file_get_contents(public_path('json/aub_majors.json'));
    $data = json_decode($json, true);

    return response()->json($data);
}
}
