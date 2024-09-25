<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'milestone_questions'; // Explicit table name

    protected $fillable = ['milestone_checklist_id', 'question'];

    public function milestoneChecklist()
    {
        return $this->belongsTo(MilestoneChecklist::class);
    }
}
