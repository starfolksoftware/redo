<?php

use StarfolkSoftware\Redo\Redo;
use StarfolkSoftware\Redo\Tests\Mocks\Recurrence;
use StarfolkSoftware\Redo\Tests\Mocks\Team;

test('teams can have recurrences', function () {
    Redo::useRecurrenceModel(Recurrence::class);

    $team = Team::forceCreate(['name' => 'Item 1']);

    $recurrence = new Recurrence(Recurrence::factory()->raw());

    $team->recurrences()->save($recurrence);

    expect($team->fresh()->recurrences()->count())->toBe(1);
});