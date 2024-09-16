<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image in the 'public/uploads' directory
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Return success response
        return back()->with('success', 'Data Berjaya Ditambah');
    }
}

