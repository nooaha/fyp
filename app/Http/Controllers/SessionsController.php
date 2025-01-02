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

            if (Auth::attempt(['username' => $attributes['username'], 'password' => $attributes['password']])) {
                session()->regenerate();
                return redirect('paparan-utama-admin')->with(['success' => 'You are logged in as admin.']);
            } else {
                return back()->withErrors(['username' => 'Username or password invalid.']);
            }
        } else {
            // Parent login
            $attributes = request()->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']])) {
                session()->regenerate();

                // Check how many children the parent has
                $parent = Auth::user();
                $children = $parent->children; // Assuming you have a `children` relationship

                if ($children->count() > 0) {
                    // Store the first child's ID in the session by default
                    session(['child_id' => $children->first()->id]);
                    return redirect()->route('user-dashboard', ['childId' => $parent->children->first()->id])->with(['success' => 'You have successfully logged in!']);
                }else {
                    return redirect('paparan-utama')->with(['error' => 'No children found.']);
                }
                
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
