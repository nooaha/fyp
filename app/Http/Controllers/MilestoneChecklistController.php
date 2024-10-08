<?php

namespace App\Http\Controllers;

use App\Models\MilestoneChecklist;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilestoneChecklistController extends Controller
{
    public function index()
    {
        $checklists = MilestoneChecklist::with('questions')->get(); // Get all milestone checklists with their questions
        return view('admin.admin-milestone-checklist', compact('checklists')); // Return the view with data

    }


    public function create()
    {
        return view('admin.admin-add-milestone');
    }

    public function store(Request $request)
    {

        // Validate the form input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'age_category' => 'required|integer',
            'description' => 'nullable|string',
            'questions' => 'required|array|min:1',  // At least one question is required
            'questions.*' => 'required|string|max:255',  // Each question must be a non-empty string
        ]);

        $questions = array_filter($request->input('questions'), function ($question) {
            return !empty($question);
        });

        if (empty($questions)) {
            return back()->withErrors(['questions' => 'Sila tambahkan sekurang-kurangnya satu soalan.']);
        }

        // Create the milestone checklist
        $milestoneChecklist = MilestoneChecklist::create([
            'title' => $validatedData['title'],
            'age_category' => $validatedData['age_category'],
            'description' => $validatedData['description'],
        ]);

        // Create associated questions
        foreach ($request->questions as $questionText) {
            Question::create([
                'milestone_checklist_id' => $milestoneChecklist->id,
                'question' => $questionText,
            ]);
        }

        return redirect()->route('milestone-checklists.index')->with('success', 'Milestone checklist and questions created successfully.');

    }


    public function show(MilestoneChecklist $milestoneChecklist)
    {
        $milestoneChecklist->load('questions');
        return view('admin.admin-milestone-view', compact('milestoneChecklist'));
    }

    public function edit($id)
    {
        // Retrieve the milestone and its associated questions
        $milestone = MilestoneChecklist::with('questions')->findOrFail($id);

        // Pass the milestone to the view
        return view('admin.admin-edit-milestone', compact('milestone'));
    }


    public function update(Request $request, $id)
    {
        $milestone = MilestoneChecklist::findOrFail($id);

        // Update milestone
        $milestone->title = $request->milestone_name;
        $milestone->age_category = $request->age_category;
        $milestone->description = $request->description;
        $milestone->save();

        // Delete questions
        if ($request->filled('deleted_questions')) {
            $deletedQuestions = explode(',', rtrim($request->deleted_questions, ','));
            Question::whereIn('id', $deletedQuestions)->delete();
        }

        // Update existing questions
        if ($request->has('questions')) {
            foreach ($request->questions as $questionId => $questionText) {
                $question = Question::findOrFail($questionId);
                $question->question = $questionText;
                $question->save();
            }
        }

        // Add new questions
        if ($request->has('new_questions')) {
            foreach ($request->new_questions as $newQuestion) {
                $milestone->questions()->create(['question' => $newQuestion]);
            }
        }

        $milestone->touch();

        return redirect()->route('milestone-checklists.index')->with('success', 'Milestone updated successfully!');
    }

    public function destroy(MilestoneChecklist $milestoneChecklist)
    {
        try {
            DB::beginTransaction();

            // This will also delete associated questions due to the onDelete('cascade') in the migration
            $milestoneChecklist->delete();

            DB::commit();

            return back()->with('success', 'Milestone checklist and associated questions deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the milestone checklist: ' . $e->getMessage());
        }
    }
}
