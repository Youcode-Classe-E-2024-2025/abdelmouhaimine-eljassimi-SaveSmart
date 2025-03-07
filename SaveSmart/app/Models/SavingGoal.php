<?php
// app/Models/SavingGoal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavingGoal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'target_amount',
        'current_amount',
        'target_date',
        'is_completed',
        'user_id',
        'family_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
