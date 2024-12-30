<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrowthRef extends Model
{
    use HasFactory;

    protected $table = 'ref_growth';

    // Add any fillable fields if needed
    protected $fillable = [
        'age_months',
        'gender',
        'height_neg_3SD',
        'height_neg_2SD',
        'height_normal_0SD',
        'height_2SD',
        'height_3SD',
        'weight_neg_3SD',
        'weight_neg_2SD',
        'weight_normal_0SD',
        'weight_2SD',
        'weight_3SD',
        
    ];
}
