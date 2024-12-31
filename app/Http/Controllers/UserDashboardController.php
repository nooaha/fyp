<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use App\Models\ReferenceData;
use App\Models\Tips;
use App\Models\Interventions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GrowthRecordController;
use App\Http\Controllers\MilestoneChecklistController;
use App\Models\GrowthRef;


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
        //$refRecords = GrowthRef::all();

        $chartData = $growthController->showChart($childId);
        $growthRecords = $chartData['growthRecords'];
        $refRecords = $chartData['refRecords'];
        //$refRecords = $growthController->showChart($childId);

        $milestoneProgress = $milestoneController->showList($childId);

        // Fetch all tips to display on the dashboard
        $tips = Tips::all(); // Retrieve all tips

         // Fetch all tips to display on the dashboard
         $interventions = Interventions::all(); // Retrieve all tips
        
        // Retrieve data for the child
        $latestMCHAT = $child->mchatResult()->latest()->first(); // Latest M-CHAT result

        $latestGrowthRecord = $child->growthRecords()->latest()->first();
        $bmi = null;
        $bmiStatus = null;

        if ($latestGrowthRecord && $latestGrowthRecord->weight && $latestGrowthRecord->height) {
            $heightInMeters = $latestGrowthRecord->height / 100; // Convert height to meters
            $bmi = round($latestGrowthRecord->weight / ($heightInMeters ** 2), 2);

            // Determine BMI status
            if ($bmi < 18.5) {
                $bmiStatus = 'Kurang Berat Badan';
            } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                $bmiStatus = 'Sihat';
            } elseif ($bmi >= 25 && $bmi <= 29.9) {
                $bmiStatus = 'Berat Badan Berlebihan';
            } else {
                $bmiStatus = 'Obesiti';
            }
        }
        
        return view('user.user-dashboard', compact('childId', 'child', 'refRecords', 'growthRecords', 'milestoneProgress', 'latestMCHAT', 'tips', 'interventions'));
    }
}
