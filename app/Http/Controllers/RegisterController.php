<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        // Validate and create the user
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'name' => ['required', 'min:3', 'max:100'],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);

        // Hash the password before saving
        $validated['password'] = bcrypt($validated['password']);

        // Create user and login
        $user = User::create($validated);
        Auth::login($user);

        // Flash a success message
        session()->flash('success', 'Your account has been created.');

        // Redirect to the user information form instead of the dashboard
        return redirect()->route('user-details.create', ['userId' => $user->id]);

   }
    
}
