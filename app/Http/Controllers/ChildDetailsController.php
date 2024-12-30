<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ParentDetail;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChildDetailsController extends Controller
{

    // ChildDetailsController.php
    public function createChildDetails()
    {
        // Return the view to add child details
        return view('user.tambah-anak'); // Ensure this is the correct blade file name for the form
    }

    public function storeChildDetails(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'child_name' => 'required|string|max:255',
            'child_dob' => 'required|date',
            'child_gender' => 'required|string|max:10',
        ]);

        // Create a new child record
        $child = new Child();
        $child->child_name = $validatedData['child_name'];
        $child->child_dob = $validatedData['child_dob'];
        $child->child_gender = $validatedData['child_gender'];
        $child->parent_id = Auth::id(); // Assuming a parent-child relationship
        $child->save();

        // Redirect with a success message
        return redirect()->route('user-details.showParentDetail', ['childId' => $child->id])
            ->with('success', 'Maklumat anak berjaya disimpan!');
    }

    public function showChildDetails($child)
    {
        $user = Auth::user();

        $child = Child::where('id', $child)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('user-details.showChildDetails', ['child' => $user->children->first()->id])
                ->with('error', 'Invalid child selected, redirecting to default.');
        }

        return view('user.maklumat-anak', compact('child'));
    }

    public function update(Request $request, $id)
    {
        $child = Child::findOrFail($id);
        $child->update($request->all()); // Update child details
        return redirect()->route('user-details.updateChildDetails', $child->id)
            ->with('success', 'Maklumat anak berjaya dikemas kini.');
    }

    public function edit($id)
    {
        $child = Child::findOrFail($id); // Fetch child by ID
        return view('user.edit-maklumat-anak', compact('child'));
    }

    public function destroyChildDetails($id)
    {
        $child = Child::find($id);

        if (!$child) {
            return redirect()->back()->with('error', 'Maklumat anak tidak dijumpai.');
        }

        $child->delete();

        return redirect()->route('user-details.showParentDetail')
            ->with('success', 'Maklumat anak berjaya dipadam.');
    }

}
