<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use App\Models\ReferenceData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GrowthRecordController;
use App\Http\Controllers\MilestoneChecklistController;


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
                ->with('error', 'Sila cuba semula.');
        }

        $growthController = new GrowthRecordController();
        $milestoneController = new MilestoneChecklistController();
        $refRecords = ReferenceData::all();

        $chartData = $growthController->showChart($childId);
        $growthRecords = $chartData['growthRecords'];

        $milestoneProgress = $milestoneController->showList($childId);
        
        // Retrieve data for the child
        $latestMCHAT = $child->mchatResult()->latest()->first(); // Latest M-CHAT result

        // Pass the data to the dashboard view
        return view('user.user-dashboard', compact('childId', 'child', 'refRecords', 'growthRecords', 'milestoneProgress', 'latestMCHAT'));
    }

}
