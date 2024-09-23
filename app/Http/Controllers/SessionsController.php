<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session-copy');
    }

    public function store(Request $request)
    {
        // Validate input based on user type (admin or parent)
        if ($request->input('user_type') === 'admin') {
            $attributes = request()->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            // Attempt to log in as admin using the username
            if (Auth::attempt(['username' => $attributes['username'], 'password' => $attributes['password']])) {
                session()->regenerate();
                return redirect('admin-dashboard')->with(['success' => 'You are logged in as admin.']);
            } else {
                return back()->withErrors(['username' => 'Username or password invalid.']);
            }
        } else {
            // Parent login
            $attributes = request()->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Attempt to log in as parent using the email
            if (Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']])) {
                session()->regenerate();
                return redirect('paparan-utama')->with(['success' => 'You are logged in.']);
            } else {
                return back()->withErrors(['email' => 'Email or password invalid.']);
            }
        }
    }


    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
