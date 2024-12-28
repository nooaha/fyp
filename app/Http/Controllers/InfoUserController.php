<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ParentDetail;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $firstChild = null;
        foreach ($validated['children'] as $index => $child) {
            $savedChild = Child::create([
                'parent_id' => $user->id,
                'child_name' => $child['name'],
                'child_dob' => $child['dob'],
                'child_gender' => $child['gender'],
            ]);

            if ($index === 0) {
                $firstChild = $savedChild;
            }
        }

        // Redirect or return a response

        return redirect()->route('user-dashboard', ['childId' => $firstChild->id])
                     ->with('success', 'Registration successful!');
    }

    public function showParentDetail()
    {
        // Get parent details
        $user = Auth::user();

        $parentDetails = ParentDetail::where('user_id', auth()->id())->first();
        //dd($parentDetails);
        $childDetails = Child::where('parent_id', auth()->id())->get();
                
        // Add age information for each child
        foreach ($childDetails as $child) {
            if (!empty($child->child_dob)) {
                $currentDate = now();
                $child->ageInMonths = $currentDate->diffInMonths($child->child_dob);
            } else {
                $child->ageInMonths = null; // Handle missing DOB
            }
        }
        // Pass both parent and child details to the view
        return view('user.papar-maklumat', compact('user','child', 'parentDetails', 'childDetails'));
    }

    //those for admin view part
    public function show()
    {
        // Retrieve all parent details
        $userDetails = User::all();
        // Pass the data to the view
        return view('admin.admin-profile', compact('userDetails'));
    }

    public function edit(User $user)
    {
        // Pass the user data to the view
        return view('admin.admin-edit-profile', compact('user'));
    }

    // Update the user details in the database
    public function update(Request $request, User $user)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        ]);

        // Update the user's information
        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
        ]);

        // Redirect back with success message
        return redirect()->route('user-details.show')->with('success', 'Maklumat pengguna berjaya dikemaskini.');
    }

    public function destroyUserDetails($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Maklumat anak tidak dijumpai.');
        }

        $user->delete();

        return redirect()->route('user-details.show')
            ->with('success', 'Maklumat anak berjaya dipadam.');
    }


    /*public function updateParentDetail(Request $request)
    {
        // Validate the input
        $request->validate([
            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'parent_id' => 'required|exists:parent_details,id', // Validate using `id`
        ]);

        // Find the parent detail record by ID
        $parentDetail = ParentDetail::findOrFail($request->parent_id);

        // Update the record with new data
        $parentDetail->update([
            'full_name' => $request->full_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        // Refresh and return to the same view with updated data
        $parentDetail->save();

        return redirect()->route('user-details.showParentDetail')->with('success', 'Maklumat berjaya dikemaskini.');
    }*/


}
