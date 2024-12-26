<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneRecord extends Model
{
    use HasFactory;
    protected $table = 'child_milestone_records'; 

    protected $fillable = [
        'child_id',
        'milestone_id',
        'question_id',
        'completed',
    ];

    public function milestone()
    {
        return $this->belongsTo(MilestoneChecklist::class, 'milestone_id');
    }

    // Relationship with Question
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
