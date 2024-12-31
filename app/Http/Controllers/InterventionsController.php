<?php

namespace App\Http\Controllers;

use App\Models\Interventions;
use Illuminate\Http\Request;

class InterventionsController extends Controller
{
    public function index()
    {
        $interventions = interventions::all();
        return view('admin.admin-interventions', compact('interventions'));
    }

    public function create()
    {
        return view('admin.admin-add-interventions');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'interventions_title' => 'required|string|max:255',
            'interventions_explain' => 'required|string|max:255',
            'interventions_reference' => 'required|url|max:255',
            'interventions_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure image is required
        ]);

        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('interventions_image')) {
            // Get the uploaded image
            $image = $request->file('interventions_image');

            // Generate a unique image name
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the image to the desired directory
            $image->move(public_path('assets/img'), $imageName);

            // Store the relative path in the database
            $imagePath = 'assets/img/' . $imageName;
        }

        // Save the tips data to the database
        Interventions::create([
            'interventions_title' => $validatedData['interventions_title'],
            'interventions_explain' => $validatedData['interventions_explain'],
            'interventions_reference' => $validatedData['interventions_reference'],
            'interventions_image' => $imagePath, // Store the image path in the database
        ]);

        // Redirect with success message
        return redirect()->route('interventions.index')->with('success', 'Intervensi Berjaya Ditambah');
    }
    public function show(Interventions $interventions)
    {
        return view('admin.admin-interventions-view', compact('interventions'));
    }

    public function edit($id)
    {
        // Fetch the tips category
        $interventions = Interventions::findOrFail($id);

        // Pass the data to the view
        return view('admin.admin-edit-interventions', compact('interventions'));
    }
    public function update(Request $request, $id)
    {
        // Validate inputs
        $request->validate([
            'interventions_title' => 'required|string|max:255',
            'interventions_explain' => 'required|string|max:255',
            'interventions_reference' => 'required|string|max:255',
            'interventions_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure image is required
        ]);

        // Fetch the category
        $interventions = Interventions::findOrFail($id);

        // Update category fields
        $interventions->interventions_title = $request->interventions_title;
        $interventions->interventions_explain = $request->interventions_explain;
        $interventions->interventions_reference = $request->interventions_reference;
        // Handle image replacement if a new image is uploaded
        if ($request->hasFile('interventions_image')) {
            // Delete the old image if it exists
            if ($interventions->interventions_image && file_exists(public_path($interventions->interventions_image))) {
                @unlink(public_path($interventions->interventions_image));  // Suppress error if file doesn't exist
            }

            // Get the uploaded image file
            $image = $request->file('interventions_image');

            // Generate a new image name (timestamp + original name)
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the image to the desired folder (public/assets/img)
            $image->move(public_path('assets/img'), $imageName);

            // Update the image path in the database
            $interventions->interventions_image = 'assets/img/' . $imageName;
        }

        // Save the updated category
        $interventions->save();

        return redirect()->route('interventions.index')->with('success', 'Intervensi Berjaya Dikemaskini');
    }

    public function destroy($id)
    {
        // Find the tips category by ID
        $interventions = Interventions::find($id);

        // Check if it exists
        if (!$interventions) {
            return redirect()->back()->with('error', 'Maklumat kategori tidak dijumpai.');
        }

        // Delete the record
        $interventions->delete();

        return redirect()->route('interventions.index')->with('success', 'Intervensi Berjaya Dipadam');
    }

    //view for user
    public function showInterventions($interventions)
    {
        $interventions = Interventions::findOrFail($interventions);

    // Retrieve the child_id from the query parameters (if available)
        $childId = request()->query('childId');
        return view('user.intervensi', compact('childId','interventions'));
    }

    public function showSenaraiIntervensi(Interventions $interventions)
    {
        $interventions = Interventions::all();
        return view('user.senarai-intervensi', compact('interventions'));
    }
}

