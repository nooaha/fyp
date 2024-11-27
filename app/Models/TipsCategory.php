<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipsCategory extends Model
{
    use HasFactory;

    protected $table = 'tipscategories'; // Matches migration table name
    protected $fillable = ['tipscategoryname', 'image'];
}
