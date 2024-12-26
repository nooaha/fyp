<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCHATAnswer extends Model
{
    use HasFactory;
    protected $table = 'mchat_answers';
    protected $fillable = [ 'child_id', 'question_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(MChatQuestion::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
