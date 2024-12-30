<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipsContent extends Model
{
    use HasFactory;

    protected $table = 'tips_content';
    protected $fillable = [
        'tips_category_id',
        'tips_content',
        'image',
    ];

    public function tips()
    {
        return $this->belongsTo(Tips::class, 'tips_category_id', 'id');
    }

}
