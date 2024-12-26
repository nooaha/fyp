<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    // Show change password form
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    // Handle password change
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata laluan sekarang tidak sah.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('edit-kata-laluan')->with('success', 'Kata laluan berjaya dikemaskini.');
    }

}
