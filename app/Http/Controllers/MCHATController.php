<?php

namespace App\Http\Controllers;
use App\Models\MCHATQuestion;
use App\Models\MCHATAnswer;
use App\Models\Child;
use App\Models\MCHATResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MCHATController extends Controller
{
    //
    public function index($childId)
    {
        $user = Auth::user();
        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('mchat.index', ['childId' => $user->children->first()->id])
                ->with('error', 'Invalid child selected, redirecting to default.');
        }

        $results = MCHATResult::with('child')
            ->select('id', 'score', 'risk_level', 'created_at')
            ->where('child_id', $childId)
            ->orderBy('created_at')
            ->get();

        return view('user.m-chat', compact('child', 'results'));
    }

    public function create($childId)
    {

        $user = Auth::user();
        $child = Child::where('id', $childId)->where('parent_id', $user->id)->first();

        if (!$child) {
            return redirect()->route('mchat.create', ['childId' => $user->children->first()->id])
                ->with('error', 'Invalid child selected, redirecting to default.');
        }

        $questions = MCHATQuestion::orderBy('created_at')->get();
        // Get all milestone checklists with their questions

        //dd($questions);
        return view('user.test-mchat', compact('child', 'questions'));
    }

    public function store(Request $request, $childId)
    {
        $child = Child::find($childId); // Ensure the child exists

        if (!$child) {
            return redirect()->back()->withErrors('Child not found');
        }

        // Retrieve the child's answers (responses)
        $responses = $request->input('answers');

        // Initialize counters
        $atRiskScore = 0;
        $criticalCount = 0;

        foreach ($responses as $questionId => $answer) {

            $question = MChatQuestion::find($questionId);

            // Ensure the question exists before proceeding
            if (!$question) {
                continue;
            }


            MChatAnswer::create([
                'child_id' => $childId,
                'question_id' => $questionId,
                'answer' => $answer,
            ]);

            // **Critical Question Handling**
            if ($question->is_critical) {
                // If it's a critical question, check if the answer matches the expected answer
                if ($question->expected_answer != $answer) {
                    $criticalCount++; // Increment if the answer does not match the expected answer for a critical question
                }
            } else {
                // **Non-Critical Question Handling**
                if ($question->expected_answer != $answer) {
                    $atRiskScore++; // Increment if the answer does not match the expected answer for a non-critical question
                }
            }
        }

        $score=0;
        // **Determine Risk Level**
        if ($criticalCount > 2 || $atRiskScore >= 3) {
            $score = $criticalCount + $atRiskScore;
            $riskLevel = 'RISIKO TINGGI';
        } elseif ($atRiskScore >= 2) {
            $score= $criticalCount + $atRiskScore;
            $riskLevel = 'RISIKO SEDERHANA';
        } else {
            $score= $criticalCount + $atRiskScore;
            $riskLevel = 'NORMAL - RISIKO RENDAH';
        }


        // Store the result in the database, associating the result with the child's ID
        $results = MChatResult::create([
            'child_id' => $childId, // Store result under the child's ID
            'score' => $score, // Store the total at-risk score
            'risk_level' => $riskLevel,

        ]);

        // Redirect to the result page with the result ID
        //return redirect()->route('mchat.result', ['resultId' => $result->id]);
        return view('user.test-result', compact('child', 'results'))
            ->with('success', 'Keputusan ujian M-CHAT anak anda sedia!');

    }

}
