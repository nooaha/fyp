<?php

namespace App\Http\Controllers;
use App\Models\ReferenceData;
use App\Models\GrowthRecord;
use App\Models\Child;
use App\Models\GrowthRef;
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
                ->with('error', 'Pilihan tidak sah, mengubah ke ketetapan.');
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
            ->with('success', 'Rekod berjaya ditambah.');
    }


    // Fetch growth records for a child
    public function showGrowthChart($childId)
    {
        $user = Auth::user();

        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('growth-tracking.showGrowthChart', ['childId' => $user->children->first()->id])
                ->with('error', 'Pilihan tidak sah, mengubah ke ketetapan.');
        }

        $childDob = $child->child_dob;
        $currentDate = now();
        $ageInMonths = $currentDate->diffInMonths($childDob);
        $ageInYears = $currentDate->diffInYears($childDob);

        // Determine which reference data to use
        
        if ($ageInMonths <= 24) {

            $refRecords = GrowthRef::select(
                'age_months',
                'gender',
                'height_3SD as height_3SD',
                'height_2SD as height_2SD',
                'height_normal_0SD as height_0SD',
                'height_neg_2SD as height_neg_2SD',
                'height_neg_3SD as height_neg_3SD',
                'weight_3SD as weight_3SD',
                'weight_2SD as weight_2SD',
                'weight_normal_0SD as weight_0SD',
                'weight_neg_2SD as weight_neg_2SD',
                'weight_neg_3SD as weight_neg_3SD'
            )
                ->where('age_months', '<=', 24)
                ->where('gender', $child->child_gender)  // First condition for gender
                ->orderBy('age_months')
                ->get();
        } else {
            $refRecords = GrowthRef::select(
                'age_months',
                'gender',
                'height_3SD as height_3SD',
                'height_2SD as height_2SD',
                'height_normal_0SD as height_0SD',
                'height_neg_2SD as height_neg_2SD',
                'height_neg_3SD as height_neg_3SD',
                'weight_3SD as weight_3SD',
                'weight_2SD as weight_2SD',
                'weight_normal_0SD as weight_0SD',
                'weight_neg_2SD as weight_neg_2SD',
                'weight_neg_3SD as weight_neg_3SD'
            )
                ->where('age_months', '>', 24)
                ->where('gender', $child->child_gender)  // First condition for gender
                ->orderBy('age_months')
                ->get();

        }

        //dd($refRecords);
        $growthRecords = GrowthRecord::with('child')
            ->where('child_id', $childId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($record) {
                $record->age_in_months = $record->child->child_dob->diffInMonths($record->created_at);
                return $record;
            });

        return view('user.growth-charts', compact('child', 'growthRecords', 'ageInMonths', 'refRecords'));
    }

    //for dashboard view
    public function showChart($childId)
    {
        $user = Auth::user();

        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('growth-tracking.showGrowthChart', ['childId' => $user->children->first()->id])
                ->with('error', 'Pilihan tidak sah, mengubah ke ketetapan.');
        }

        $childDob = $child->child_dob;
        $currentDate = now();
        $ageInMonths = $currentDate->diffInMonths($childDob);
        
        // Determine which reference data to use
        
        if ($ageInMonths <= 24) {

            $refRecords = GrowthRef::select(
                'age_months',
                'gender',
                'weight_3SD as weight_3SD',
                'weight_2SD as weight_2SD',
                'weight_normal_0SD as weight_0SD',
                'weight_neg_2SD as weight_neg_2SD',
                'weight_neg_3SD as weight_neg_3SD'
            )
                ->where('age_months', '<=', 24)
                ->where('gender', $child->child_gender)  // First condition for gender
                ->orderBy('age_months')
                ->get();
        } else {
            $refRecords = GrowthRef::select(
                'age_months',
                'gender',
                'weight_3SD as weight_3SD',
                'weight_2SD as weight_2SD',
                'weight_normal_0SD as weight_0SD',
                'weight_neg_2SD as weight_neg_2SD',
                'weight_neg_3SD as weight_neg_3SD'
            )
                ->where('age_months', '>', 24)
                ->where('gender', $child->child_gender)  // First condition for gender
                ->orderBy('age_months')
                ->get();

        }

              
        $growthRecords = GrowthRecord::with('child')
            ->where('child_id', $childId)
            ->orderBy('created_at')
            ->get()
            ->map(function ($record) {
                $record->age_in_months = $record->child->child_dob->diffInMonths($record->created_at);
                return $record;
            });
  
        // Return the data instead of the view
        return [
            'child' => $child,
            'growthRecords' => $growthRecords,
            'ageInMonths' => $ageInMonths,
            'refRecords' => $refRecords,
        ];
        
    }

}
