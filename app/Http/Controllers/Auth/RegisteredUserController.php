<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|unique:users,username|max:50',
            'email' => 'required|string|email|max:255|unique:users,email',
            'gender' => 'required|in:male,female',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
             // You can use 'admin' or 'user' as valid roles
        ]);

        // Assign role as 'user' by default, unless 'role' is specified as 'admin'
        $role = $validatedData['role'] ?? 'user';

        // Create the user with the role assigned
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'gender' => $validatedData['gender'],
            'password' => Hash::make($validatedData['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect after registration
        return redirect()->route('home');
    }
}
