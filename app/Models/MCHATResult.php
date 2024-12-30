<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCHATResult extends Model
{
    use HasFactory;
    protected $table = 'mchat_results';
    protected $fillable = ['child_id', 'score', 'risk_level'];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    
}
