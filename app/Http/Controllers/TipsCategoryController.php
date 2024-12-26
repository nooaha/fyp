<?php

namespace App\Http\Controllers;

use App\Models\Tips; // Updated model name
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'tipscategoryname' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tipscategory = new Tips();
        $tipscategory->tipscategoryname = $request->tipscategoryname;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $tipscategory->image = $path;
        }

        $tipscategory->save();

        return redirect()->route('tips-categories.index')->with('success', 'Category added successfully.');
    }

    public function show(Tips $tipscategory)
    {
        $tipscategory->load('questions');
        return view('admin.admin-tips-view', compact('tipscategory'));
    }

    public function edit($id)
    {
        // Fetch the tips category by ID
        $tipscategory = Tips::findOrFail($id);

        // Pass the data to the view
        return view('admin.admin-edit-category-tips', compact('tipscategory'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'tipscategoryname' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Find the existing category
    $tipscategory = TipsCategory::findOrFail($id);
    $tipscategory->tipscategoryname = $request->tipscategoryname;

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($tipscategory->image) {
            \Storage::delete('public/' . $tipscategory->image);
        }

        // Store the new image
        $path = $request->file('image')->store('images', 'public');
        $tipscategory->image = $path;
    }

    $tipscategory->save();

    return redirect()->route('tips-categories.index')->with('success', 'Category updated successfully.');
}



    public function destroy(Tips $tipscategory)
    {
        try {
            DB::beginTransaction();

            $tipscategory->delete();

            DB::commit();

            return back()->with('success', 'Senarai tips berjaya dipadam!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the ' . $e->getMessage());
        }
    }


}
