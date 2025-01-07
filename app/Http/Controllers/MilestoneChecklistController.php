<?php

namespace App\Http\Controllers;

use App\Models\MilestoneChecklist;
use App\Models\MilestoneRecord;
use App\Models\Child;
use App\Mail\MilestoneReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilestoneChecklistController extends Controller
{
    public function index()
    {
        $checklists = MilestoneChecklist::with('questions')->get(); // Get all milestone checklists with their questions
        return view('admin.admin-milestone-checklist', compact('checklists')); // Return the view with data

    }

    public function showMilestoneList($childId)
    {
        // Fetch the milestones
        $milestones = MilestoneChecklist::with('questions')->get();

        // Calculate progress for each milestone
        $milestoneProgress = $milestones->map(function ($milestone) use ($childId) {
            $questionsCount = $milestone->questions->count();

            //Calculate completed questions for the specific child
            $completedCount = MilestoneRecord::where('child_id', $childId)
                ->where('milestone_id', $milestone->id)
                ->where('completed', 1)
                ->count();

            // Calculate progress percentage
            $progress = $questionsCount > 0 ? round(($completedCount / $questionsCount) * 100) : 0;

            return [
                'milestone' => $milestone,
                'progress' => $progress,
            ];
        });
        $child = Child::find($childId);
        $ageInMonths = now()->diffInMonths($child->child_dob);

        return view('user.child-milestone', compact('milestoneProgress', 'childId','child', 'ageInMonths'));
    }

    public function showList($childId)
    {
        // Fetch the milestones and calculate progress for each milestone
        $milestones = MilestoneChecklist::with('questions')->get();
        $milestoneProgress = $milestones->map(function ($milestone) use ($childId) {
            $questionsCount = $milestone->questions->count();

            // Calculate completed questions for the specific child
            $completedCount = MilestoneRecord::where('child_id', $childId)
                ->where('milestone_id', $milestone->id)
                ->where('completed', 1)
                ->count();

            // Calculate progress percentage
            $progress = $questionsCount > 0 ? round(($completedCount / $questionsCount) * 100) : 0;

            return [
                'milestone' => $milestone,
                'progress' => $progress,
            ];
        });

        return $milestoneProgress; // Return only the data, not the view
    }

    public function show(MilestoneChecklist $milestoneChecklist)
    {
        $milestoneChecklist->load('questions');
        return view('admin.admin-milestone-view', compact('milestoneChecklist'));
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
            'age_category' => 'required|string',
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

        return redirect()->route('milestone-checklists.index')->with('success', 'Senarai semak perkembangan dan soalan berjaya disimpan!');

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

        return redirect()->route('milestone-checklists.index')->with('success', 'Senarai semak perkembangan dan soalan berjaya dikemaskini!');
    }

    public function destroy(MilestoneChecklist $milestoneChecklist)
    {
        try {
            DB::beginTransaction();

            // This will also delete associated questions due to the onDelete('cascade') in the migration
            $milestoneChecklist->delete();

            DB::commit();

            return back()->with('success', 'Senarai semak perkembangan dan soalan berjaya dipadam!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Ralat berlaku semasa memadam senarai semak pencapaian.: ' . $e->getMessage());
        }
    }

    public function sendReminders()
    {
        $today = Carbon::now();
        $children = Child::with('parent')->get();

        foreach ($children as $child) {
            $ageInMonths = $today->diffInMonths(Carbon::parse($child->child_dob));
            $nextMilestone = $this->getNextMilestone($ageInMonths);

            if ($nextMilestone) {
                // Send the reminder email
                Mail::to($child->parent->email)->send(new MilestoneReminderMail($child, $nextMilestone));
                // Optionally log or display success message
                // You could log the action or notify about the reminder being sent
            }
        }

        // Redirect back with a success message after reminders are sent
        return redirect()->back()->with('success', 'Peringatan telah dihantar kepada semua ibu bapa.');
    }

    // This function calculates the next milestone based on the child's age in months
    private function getNextMilestone($ageInMonths)
    {
        // Define the milestone ages in months
        $milestones = [12,15,18,21,24,30,36,42,48,60, 72]; // Example milestone ages in months

        // Loop through the milestones and return the next milestone for the child
        foreach ($milestones as $milestone) {
            if ($ageInMonths < $milestone) {
                return "{$milestone}";  // Return the next milestone to send as a reminder
            }
        }
        
        // If there are no upcoming milestones, return null
        return null;
    }
}
