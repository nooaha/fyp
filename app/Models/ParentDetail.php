<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentDetail extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'parent_details';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',     // Foreign key to the users table
        'full_name',   // Full name of the parent
        'dob',         // Parent's dob
        'gender',      // Parent's gender (or 'role' like mom/dad)
        'address',     // Parent's address
    ];

    // Define the relationship with the User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parentDetails()
    {
        return $this->hasMany(ParentDetail::class, 'user_id');
    }

    // Define the relationship with Children
    public function children()
    {
        return $this->hasMany(Child::class, 'parent_id');
    }

    public function parentDetail()
    {
        return $this->hasOne(ParentDetail::class);
    }
}
