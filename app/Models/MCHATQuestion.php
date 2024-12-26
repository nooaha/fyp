<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCHATQuestion extends Model
{
    use HasFactory;
    protected $table = 'mchat_questions';

    protected $fillable = ['question_text', 'is_critical', 'expected_answer'];

    public function answers()
    {
        return $this->hasMany(MChatAnswer::class);
    }
}
