<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'color',
        'family_id',
        'is_default'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
