<?php

use StarfolkSoftware\Redo\Redo;
use StarfolkSoftware\Redo\Tests\Mocks\Recurrence;
use StarfolkSoftware\Redo\Tests\Mocks\Task;

test('recurrence can be added to a recurrable model', function () {
    Redo::useRecurrenceModel(Recurrence::class);

    $task = Task::forceCreate(['title' => 'Task 1']);

    $startsAt = now();

    $task->makeRecurrable(
        frequency: 'DAILY',
        interval: 1,
        startsAt: $startsAt,
    );

    expect($task->fresh()->recurrence()->count())->toBe(1);
    expect($task->recurrence)
        ->frequency->toBe('DAILY')
        ->interval->toBe(1);
    expect($task->recurrenceIsActive())->toBeTrue();
    expect($task->currentRecurrence())->toBeInstanceOf(\DateTime::class);
    expect($task->nextRecurrence())->toBeInstanceOf(\DateTime::class);
    expect($task->firstRecurrence())->toBeInstanceOf(\DateTime::class);
    expect($task->lastRecurrence())->toBeInstanceOf(\DateTime::class);
});

test('recurrence can be updated', function () {
    Redo::useRecurrenceModel(Recurrence::class);

    $task = Task::forceCreate(['title' => 'Task 1']);

    $startsAt = now();

    $task->makeRecurrable(
        frequency: 'DAILY',
        interval: 1,
        startsAt: $startsAt,
    );

    expect($task->recurrence)
        ->frequency->toBe('DAILY')
        ->interval->toBe(1);

    $task->updateRecurrence(
        frequency: 'MONTHLY',
        interval: 1,
        startsAt: $startsAt,
    );

    expect($task->fresh()->recurrence)
        ->frequency->toBe('MONTHLY')
        ->interval->toBe(1);
});

test('recurrence can be paused', function () {
    Redo::useRecurrenceModel(Recurrence::class);

    $task = Task::forceCreate(['title' => 'Task 1']);

    $startsAt = now();

    $task->makeRecurrable(
        frequency: 'DAILY',
        interval: 1,
        startsAt: $startsAt,
    );

    $task->pauseRecurrence();

    expect($task->currentRecurrence())->toBeNull();

    $task->pauseRecurrence(false);

    expect($task->currentRecurrence())->toBeInstanceOf(\DateTime::class);
});
