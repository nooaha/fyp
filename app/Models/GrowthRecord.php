<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrowthRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_id',
        'record_date',
        'weight',
        'height',
    ];

    // Relationship to the Child model
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
