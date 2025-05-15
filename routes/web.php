<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\FavoritesController;
use Illuminate\Support\Facades\Auth;

// Default landing page
Route::get('/', function () {
    return view('page');
});

// Middleware to protect dashboard and other routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Protected page route
    Route::get('/page', function () {
        return view('page');
    })->name('page');
    
    // Profile routes
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // View profile
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Edit profile form
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
    });
});

// Breeze Authentication Routes (already set up by Breeze)
require __DIR__.'/auth.php';

// Custom application routes
Route::get('/home', [PageController::class, 'index'])->name('home');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/create', [PageController::class, 'create'])->name('create');
Route::get('/edit/{university}', [PageController::class, 'edit'])->name('edit');
Route::get('/show/{university}', [PageController::class, 'show'])->name('show');
Route::put('/universities/{university}', [PageController::class, 'update'])->name('universities.update');
Route::post('/store', [PageController::class, 'store'])->name('store');
Route::delete('/universities/{university}', [PageController::class, 'destroy'])->name('destroy');

// Faculty and Major routes
Route::post('/universities/{university}/faculties', [FacultyController::class, 'store'])->name('faculties.store');
Route::get('/universities/{university}/faculties/create', [FacultyController::class, 'create'])->name('faculties.create');
Route::get('/university/{id}', [UniversityController::class, 'showUniversity'])->name('show');
Route::get('/universities/search', [UniversityController::class, 'search'])->name('search');

Route::post('/faculties/{facultyId}/majors', [MajorController::class, 'store'])->name('majors.store');
Route::get('faculties/{facultyId}/majors/create', [MajorController::class, 'create'])->name('majors.create');

Route::middleware(['role:university_manager'])->group(function () {
    Route::get('/add-university', [UniversityController::class, 'create']);
    Route::post('/store-university', [UniversityController::class, 'store']);
});

Route::post('/register', [RegisteredUserController::class, 'register']);
Route::get('/aub-majors', [FacultyController::class, 'getAUBMajors']);
  

Route::get('/showaub-json', [UniversityController::class, 'showJson']);
Route::get('/get-json', [UniversityController::class, 'fetchJson']);
Route::get('/mu-majors', [UniversityController::class, 'getMUMajors']);
Route::get('/mu-majors-view', function () {
    return view('mu_majors');

});




Route::get('/universities/{id}', [UniversityController::class, 'show'])->name('universities.show');
Route::get('/mu_majors', function () {
    return view('mu_majors');
})->name('mu_majors');


Route::get('/showaub-json', function(){
return view('showaub-json');

}) -> name('aub_majors');




