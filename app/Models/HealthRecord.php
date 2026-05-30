<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    protected $fillable = [
        'recorded_date', 'steps', 'weight_lbs', 'resting_heart_rate',
        'active_calories', 'total_calories', 'sleep_hours', 'sleep_score',
        'stand_hours', 'exercise_minutes', 'vo2_max', 'hrv', 'notes', 'source',
    ];

    protected $casts = [
        'recorded_date' => 'date',
        'weight_lbs' => 'decimal:1',
        'sleep_hours' => 'decimal:1',
        'vo2_max' => 'decimal:1',
    ];
}
