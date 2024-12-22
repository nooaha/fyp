<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceData extends Model
{
    use HasFactory;
    protected $table = 'reference_data';

    // Add any fillable fields if needed
    protected $fillable = [
        'age_months',
        'height_normal_3SD',
        'height_normal_0SD',
        'height_min',
        'weight_obese_3SD',
        'weight_normal_0SD',
        'weight_min',
    ];
}
