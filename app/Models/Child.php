<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = ['child_name', 'child_dob', 'child_gender', 'height', 'weight', 'parent_id'];

    protected $casts = [
        'child_dob' => 'date',
        'child_gender' => 'string',
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    
    // Define inverse relationship
    public function parent()
    {
        return $this->belongsTo(User::class);
    }

    public function growthRecords()
    {
        return $this->hasMany(GrowthRecord::class);
    }

    public function mchatAnswers()
    {
        return $this->hasMany(MChatAnswer::class);
    }

    public function mchatResult()
    {
        return $this->hasMany(MChatResult::class);
    }
}
