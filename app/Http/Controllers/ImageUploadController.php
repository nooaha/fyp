<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the uploaded file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            // Return success response or redirect
            return back()->with('success', 'Image uploaded successfully');
        }

        return back()->withErrors(['image' => 'Image upload failed']);
    }
}
