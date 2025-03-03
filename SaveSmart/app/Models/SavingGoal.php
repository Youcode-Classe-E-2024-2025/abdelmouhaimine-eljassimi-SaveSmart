<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'family_id',
        'user_id'
    ];

    protected $casts = [
        'target_date' => 'date',
        'is_completed' => 'boolean',
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2'
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount <= 0) {
            return 0;
        }

        return min(100, ($this->current_amount / $this->target_amount) * 100);
    }
}
