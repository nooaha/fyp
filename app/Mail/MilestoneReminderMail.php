<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MilestoneReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $child;
    public $milestone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($child, $milestone)
    {
        $this->child = $child;
        $this->milestone = $milestone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Peringatan Semak Perkembangan {$this->child->child_name}")
                    ->view('emails.milestone_reminder');
    }
}
