<?php

namespace StarfolkSoftware\Redo\Tests\Mocks;

use StarfolkSoftware\Redo\Recurrence as RedoRecurrence;

class Recurrence extends RedoRecurrence
{
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return RecurrenceFactory::new();
    }
}
