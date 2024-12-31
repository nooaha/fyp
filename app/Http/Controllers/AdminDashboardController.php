<?php

namespace App\Http\Controllers;
use App\Models\MilestoneChecklist;
use App\Models\MilestoneRecord;
use App\Models\User;
use App\Models\Child;
use App\Models\Tips;
use App\Models\Interventions;
use App\Models\MCHATResult;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Section: Paparan Data Pengguna
        $registeredUsers = User::count(); // Total registered users
        //$activeUsers = User::where('last_active_at', '>=', now()->subDays(30))->count(); // Active users in the last 30 days
        $newUsers = User::where('created_at', '>=', now()->subDays(30))->count(); // New users in the last 30 days

        // Section: Paparan Data Pencapaian Perkembangan dan M-CHAT
        $totalChildren = Child::count(); // Total number of children
        $completedMilestones = MilestoneRecord::where('completed', 1)->count(); // Completed milestones
        $totalMilestones = MilestoneChecklist::count(); // Total milestones
        $completionRate = $totalMilestones > 0 ? ($completedMilestones / $totalMilestones) * 100 : 0; // Completion rate
        $highRiskMCHAT = MCHATResult::where('risk_level', 'RISIKO TINGGI')->count(); // High-risk M-CHAT results

        // Latest milestone checklists (existing functionality)
        $checklists = MilestoneChecklist::orderBy('updated_at', 'desc')->take(5)->get();
        $tips = Tips::latest('updated_at')->first();
        $interventions = Interventions::latest('updated_at')->first();

        return view('admin.admin-dashboard', compact(
            'checklists',
            'registeredUsers',

            'newUsers',
            'totalChildren',
            'completionRate',
            'highRiskMCHAT',
            'tips',
            'interventions'

        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
