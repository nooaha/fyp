<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ParentDetail;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoUserController extends Controller
{
    public function create()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('user.user-fill-form', compact('user')); // Pass the user to the view
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'dob' => 'required|date',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'children' => 'required|array',  // Child input is an array
            'children.*.name' => 'required|string|max:255',
            'children.*.dob' => 'required|date',
            'children.*.gender' => 'required|string|max:10',
        ]);

        $user = Auth::user();  // Get the current authenticated user

        // Create parent details
        $parentDetail = ParentDetail::create([
            'user_id' => $user->id, // Store the relationship between parent details and the user
            'full_name' => $validated['full_name'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
        ]);

        // Save each child in Children table
        foreach ($validated['children'] as $child) {
            Child::create([
                'parent_id' => $user->id, // Link child to the newly created parent details
                'child_name' => $child['name'],
                'child_dob' => $child['dob'],
                'child_gender' => $child['gender'],
            ]);
        }

        // Redirect or return a response
        
        return redirect()->route('user-dashboard')->with('success', 'Info stored successfully.');
    }
}
