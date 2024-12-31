<?php

namespace App\Http\Controllers;

use App\Models\Tips; // Updated model name
use Illuminate\Http\Request;

class TipsCategoryController extends Controller
{
    public function index()
    {
        $tipscategories = Tips::all();
        return view('admin.admin-tips', compact('tipscategories'));
    }

    public function create()
    {
        return view('admin.admin-add-category-tips');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'tips_name' => 'required|string|max:255',
            'age_category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure image is required
        ]);

        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Get the uploaded image
            $image = $request->file('image');

            // Generate a unique image name
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the image to the desired directory
            $image->move(public_path('assets/img'), $imageName);

            // Store the relative path in the database
            $imagePath = 'assets/img/' . $imageName;
        }

        // Save the tips data to the database
        Tips::create([
            'tips_name' => $validatedData['tips_name'],
            'age_category' => $validatedData['age_category'],
            'image' => $imagePath, // Store the image path in the database
        ]);

        // Redirect with success message
        return redirect()->route('tips-categories.index')->with('success', 'Tip Berjaya Ditambah.');
    }

    public function show(Tips $tipscategory)
    {
        return view('admin.admin-tips-view', compact('tipscategory'));
    }

    //users view
    public function showTips($tips)
    {
        $tips = Tips::findOrFail($tips);

    // Retrieve the child_id from the query parameters (if available)
        $childId = request()->query('childId');
        return view('user.tips', compact('childId','tips'));
    }

    public function showTipsIntervensi()
    {
        return view('user.pilihan-tips-intervensi');
    }

    public function showSenaraiTips(Tips $tips)
    {
        $tips = Tips::all();
        return view('user.senarai-tips', compact('tips'));
    }

    public function edit($id)
    {
        // Fetch the tips category
        $tipscategory = Tips::findOrFail($id);

        // Pass the data to the view
        return view('admin.admin-edit-category-tips', compact('tipscategory'));
    }

    public function update(Request $request, $id)
    {
        // Validate inputs
        $request->validate([
            'tipscategoryname' => 'required|string|max:255',
            'age_category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch the category
        $tipscategory = Tips::findOrFail($id);

        // Update category fields
        $tipscategory->tips_name = $request->tipscategoryname;
        $tipscategory->age_category = $request->age_category;

        // Handle image replacement if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($tipscategory->image && file_exists(public_path($tipscategory->image))) {
                @unlink(public_path($tipscategory->image));  // Suppress error if file doesn't exist
            }

            // Get the uploaded image file
            $image = $request->file('image');

            // Generate a new image name (timestamp + original name)
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the image to the desired folder (public/assets/img)
            $image->move(public_path('assets/img'), $imageName);

            // Update the image path in the database
            $tipscategory->image = 'assets/img/' . $imageName;
        }

        // Save the updated category
        $tipscategory->save();

        return redirect()->route('tips-categories.index')->with('success', 'Tip Berjaya Dikemaskini!');
    }

    public function destroyTips($id)
    {
        // Find the tips category by ID
        $tipscategory = Tips::find($id);

        // Check if it exists
        if (!$tipscategory) {
            return redirect()->back()->with('error', 'Maklumat kategori tidak dijumpai.');
        }

        // Delete the record
        $tipscategory->delete();

        return redirect()->route('tips-categories.index')->with('success', 'Tip Berjaya Dipadam.');
    }
}
