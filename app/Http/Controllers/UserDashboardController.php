<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDashboardController extends Controller
{
    public function index()
    {
        // No need to check again for the first child since it's already set in the session
        $user = Auth::user();
        if (!session()->has('child_id')) {
            return redirect('user-dashboard')->with(['error' => 'No child available.']);
        }

        // Redirect to the child's dashboard using the child_id in the session
        return redirect()->route('user-dashboard', ['child_id' => session('child_id')]);
    }

    
    public function showChildDashboard($child_id)
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
    }  
 

}
