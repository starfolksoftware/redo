<?php

namespace StarfolkSoftware\Redo\Tests\Mocks;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecurrenceFactory extends Factory
{
    protected $model = Recurrence::class;

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
