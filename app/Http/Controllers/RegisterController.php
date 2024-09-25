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
    return view('session.register')->withErrors(session('errors'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:50', Rule::unique('users', 'username')], // Check for unique username
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);

        // Hash the password before saving
        $attributes['password'] = bcrypt($attributes['password']);

        // Create user and login
        $user = User::create($attributes);
        Auth::login($user);

        // Flash a success message
        session()->flash('success', 'Your account has been created.');

        // Redirect to the user information form instead of the dashboard
        return redirect()->route('userInfo');  // Redirects to user info form
    }
}
