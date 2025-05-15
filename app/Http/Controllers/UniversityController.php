<?php
namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UniversityController extends Controller
{
    
//     public function showUniversity($id)
//     {
//         $university = University::with('faculties.majors')->findOrFail($id); 

//         $faculties = $university->faculties;  

//         return view('show', compact('university'));
//     }

//     public function create()
//     {
//         return view('create');
//     }

//     public function show(University $university)
//     {
//         $isFavorited = false;
        
//         if (Auth::check()) {
//             $isFavorited = $university->isFavoritedBy(Auth::user());
//         }
        
//         return view('universities.show', [
//             'university' => $university,
//             'isFavorited' => $isFavorited
//         ]);
//     }

//     public function addToFavorites($universityId)
//     {
//         $user = Auth::user();
//         $university = University::findOrFail($universityId);

//         dd(Auth::user()->favoriteUniversities);
        
//         if (!$user->favoriteUniversities()->where('university_id', $universityId)->exists()) {
//             $user->favoriteUniversities()->attach($universityId);
//             return back()->with('success', 'University added to your favorites!');
//         }

//         return back()->with('info', 'University is already in your favorites!');
//     }

//     public function removeFromFavorites($universityId)
//     {
//         $user = Auth::user();
//         $university = University::findOrFail($universityId);

//         dd(Auth::user()->favoriteUniversities);

//         $user->favoriteUniversities()->detach($universityId);
//         return back()->with('success', 'University removed from your favorites!');
//     }

//     public function edit(University $university)
//     {
//         return view('edit', compact('university'));
//     }

//     public function update(Request $request, University $university)
//     {
//         $validatedData = $request->validate([
//             'UniName' => 'required|string|max:255',
//             'Description' => 'required|string',
//         ]);

//         $university->update($validatedData);

//         return redirect()->route('home', ['university' => $university->id])
//             ->with('success', 'University updated successfully!');
//     }

//     public function destroy($id)
//     {
//         $university = University::findOrFail($id);

//         $university->delete();

//         return redirect()->route('home')->with('success', 'University deleted successfully');
//     }

//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'name' => 'required|max:50',
//         'founded_year' => 'required|date',
//         'website' => 'required|max:50|url',
//     ]);

//     // Set the university status as 'pending' until admin approves
//     $validatedData['status'] = 'pending'; // assuming you have a status field in your database

//     // Create the university with the 'pending' status
//     University::create($validatedData);

//     return redirect()->route('home')->with('success', 'University added successfully! Awaiting admin approval.');
// }
// public function approve($id)
// {
//     // Find the university by ID
//     $university = University::findOrFail($id);

//     // Update the university status to 'approved'
//     $university->status = 'approved';
//     $university->save();

//     // Redirect back to the admin dashboard with a success message
//     return redirect()->route('admin.index')->with('success', 'University approved successfully!');
// }


//     public function search(Request $request)
//     {
//         $query = $request->input('query');

//         $universities = University::where('name', 'LIKE', "%{$query}%")->get();

//         return view('home', compact('universities'));
//     }



    public function showJson()
    {
        return view('show-json'); // Blade view name
    }

    public function fetchJson()
    {
        $json = file_get_contents(public_path('json/aub_majors.json'));
        $data = json_decode($json, true);

        return response()->json($data);
    }

    public function getMUMajors()
{
    $json = file_get_contents(public_path('json/mu_majors.json'));
    $data = json_decode($json, true);

    return response()->json($data);
}


public function show($id)
{
    $university = University::findOrFail($id);
    return view('universities.show', compact('university'));
}


}
