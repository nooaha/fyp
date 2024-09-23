<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneChecklist extends Model
{
    protected $table = 'milestone_checklists'; // Explicit table name

    protected $fillable = ['title', 'age_category', 'description'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
