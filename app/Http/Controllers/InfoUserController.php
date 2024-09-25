<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function submitUserInfo(Request $request)
    {
        // Validate the form data
        $request->validate([
            'parent_name' => 'required|string|max:255',
            'parent_dob' => 'required|date',
            'parent_gender' => 'required|string',
            'parent_address' => 'required|string',
            'child_name' => 'required|string|max:255',
            'child_dob' => 'required|date',
            'child_gender' => 'required|string',
        ]);

        // Handle saving the data (if you have models for this)

        // Redirect to the dashboard after successful form submission
        return redirect()->route('dashboard');
    }
}
