<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDashboardController extends Controller
{
    public function index($childId)
    {
        $user = Auth::user(); // Get the logged-in user

        // Validate that the child belongs to the current user
        $child = Child::where('id', $childId)
            ->where('parent_id', $user->id)
            ->first();

        if (!$child) {
            return redirect()->route('user-dashboard', ['childId' => $user->children->first()->id])
                ->with('error', 'Child not found or does not belong to you.');
        }

        // Pass the data to the dashboard view
        return view('user.user-dashboard', compact('childId', 'child'));
    }



    /*public function showChildDashboard($child_id)
    {
        $parent = Auth::user();
    
        // Check if the user has children before attempting to find a specific child
        if ($parent->children->isEmpty()) {
            return redirect()->route('paparan-utama')->with('error', 'You have not added any children yet.');
        }
    
        // Find the child by ID, or fail gracefully if the child doesn't exist
        $child = $parent->parent()->findOrFail($child_id);
    
        // Store selected child ID in session (optional if it's already set)
        session(['child_id' => $child_id]);
    
        
        return view('child.dashboard', compact('child', 'growthRecords', 'milestoneProgress', 'mchatResults'));
    }  */


}
