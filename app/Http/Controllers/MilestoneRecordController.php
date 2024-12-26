<?php

namespace App\Http\Controllers;

use App\Models\MilestoneChecklist;
use App\Models\MilestoneRecord;

use Illuminate\Http\Request;

class MilestoneRecordController extends Controller
{
    //
    public function index(Request $request)
    {
        $milestoneId = $request->query('milestone_id');
        $childId = $request->query('childId');

        // Fetch the milestone details
        $milestone = MilestoneChecklist::with('questions')->findOrFail($milestoneId);

        if (!$milestone) {
            return redirect()->back()->with('error', 'Milestone not found.');
        }
        // Fetch questions related to the milestone
        $questions = $milestone->questions;

        // Fetch responses for the child and milestone
        $responses = MilestoneRecord::where('child_id', $childId)
            ->whereIn('question_id', $questions->pluck('id'))
            ->get()
            ->keyBy('question_id'); // Key by question_id for easy lookup

        return view('user.checklist-milestone', compact('milestone', 'questions', 'responses', 'childId'));
    }

    public function store(Request $request)
    {
        $childId = $request->input('childId');
        $milestoneId = $request->input('milestone_id');
        $responses = $request->input('questions', []);

        foreach ($responses as $questionId => $response) {
            MilestoneRecord::updateOrCreate(
                [
                    'child_id' => $childId,
                    'milestone_id' => $milestoneId,
                    'question_id' => $questionId,
                ],
                [
                    'completed' => $response === 'yes',
                ]
            );
        }

        return redirect()->route('record-milestone.index', ['milestone_id' => $milestoneId, 'childId' => $childId])
            ->with('success', 'Rekod berjaya disimpan!');
    }


}
