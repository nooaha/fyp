<?php

namespace App\Http\Controllers;

use App\Models\GrowthRecord;
use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GrowthRecordController extends Controller
{
    public function index($childId)
    {
        $user = Auth::user(); // Get the logged-in user

        // Validate that the child belongs to the current user
        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('growth-tracking.showGrowthChart', ['childId' => $user->children->first()->id])
                ->with('error', 'Invalid child selected, redirecting to default.');
        }
        // Retrieve growth data (e.g., height and weight records)
        $growthData = [
            'height' => $child->height,
            'weight' => $child->weight,
            // Add more growth-related data as needed
        ];

        // Pass child and growth data to the view
        return view('user.growth-charts', compact('child', 'growthData'));
    }

    public function add($childId)
    {
        $user = Auth::user(); // Get the logged-in user

        // Validate that the child belongs to the current user
        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();


        // Pass child and growth data to the view
        return view('user.add-growth', compact('child'));
    }

    // Store growth records
    public function store(Request $request, $childId)
    {
        $validated = $request->validate([
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
        ]);

        $child = Child::findOrFail($childId);

        GrowthRecord::create([
            'child_id' => $child->id,
            'weight' => $validated['weight'],
            'height' => $validated['height'],
        ]);

        return redirect()->route('growth-tracking.showGrowthChart', ['childId' => $childId])
            ->with('success', 'Growth record added successfully.');
    }


    // Fetch growth records for a child
    public function showGrowthChart($childId)
    {
        $user = Auth::user();

        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('growth-tracking.showGrowthChart', ['childId' => $user->children->first()->id])
                ->with('error', 'Invalid child selected, redirecting to default.');
        }

        $childDob = $child->child_dob;
        $currentDate = now();
        $ageInMonths = $currentDate->diffInMonths($childDob);

        $refRecords = DB::table('reference_data')
            ->select(
                'age_months',
                'height_normal_3SD as height3SD',
                'height_normal_0SD as height0SD',
                'height_min as heightMin',
                'weight_obese_3SD as weight3SD',
                'weight_normal_0SD as weight0SD',
                'weight_min as weightMin'
            )
            ->orderBy('age_months')
            ->get();

        $growthRecords = DB::table('growth_records')
            ->join('children', 'growth_records.child_id', '=', 'children.id')
            ->select(
                'growth_records.height',
                'growth_records.weight',
                DB::raw('TIMESTAMPDIFF(MONTH, children.child_dob, growth_records.created_at) as age_in_months')
            )
            ->where('growth_records.child_id', $childId)
            ->orderBy('growth_records.created_at')
            ->get();

        return view('user.growth-charts', compact('child', 'growthRecords', 'ageInMonths', 'refRecords'));
    }


}
