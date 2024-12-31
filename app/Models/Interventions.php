<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interventions extends Model
{
    use HasFactory;

    protected $table = 'interventions';
    protected $fillable = [
        'interventions_title',
        'interventions_explain',
        'interventions_image',
        'interventions_reference',
    ];
}
