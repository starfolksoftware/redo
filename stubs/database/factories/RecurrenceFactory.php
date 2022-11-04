<?php

namespace StarfolkSoftware\Gauge\Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'team_id' => 1,
            'recurrable_type' => 'App\\Models\\Task',
            'recurrable_id' => 1,
            'frequency' => 'DAILY',
            'starts_at' => now(),
        ];
    }
}