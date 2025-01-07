<?php

namespace App\Console\Commands;

use App\Mail\MilestoneReminderMail;
use Illuminate\Console\Command;
use App\Models\Child;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendMilestoneReminders extends Command
{
    protected $signature = 'milestones:send-reminders';
    protected $description = 'Send email reminders for upcoming child milestones';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::now();
        $children = Child::with('parent')->get();

        foreach ($children as $child) {
            $ageInMonths = $today->diffInMonths(Carbon::parse($child->child_dob));
            $nextMilestone = $this->getNextMilestone($ageInMonths);

            if ($nextMilestone) {
                Mail::to($child->parent->email)->send(new MilestoneReminderMail($child, $nextMilestone));
                $this->info("Reminder sent for {$child->child_name} (Milestone: $nextMilestone)");
            }
        }
    }

    private function getNextMilestone($ageInMonths)
    {
        $milestones = [18, 24, 36]; // Example milestone ages in months
        foreach ($milestones as $milestone) {
            if ($ageInMonths < $milestone) {
                return "{$milestone}-month milestone";
            }
        }
        return null;
    }
}
