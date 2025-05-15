<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Faculty;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function create($facultyId)
{
    $faculty = Faculty::findOrFail($facultyId); 
    return view('majors.create', compact('faculty')); 
}


    public function store(Request $request, $facultyId)
    {
        $validated = $request->validate([
            'MajorName' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $faculty = Faculty::findOrFail($facultyId);
        $major = new Major($validated);
        $faculty->majors()->save($major); 

        return redirect()->route('show', $faculty->university_id)
                 ->with('success', 'Major added successfully!');

    }
}
