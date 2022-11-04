<?php

use StarfolkSoftware\Redo\Redo;
use StarfolkSoftware\Redo\Tests\Mocks\Recurrence;

test('recurrence can be saved to database', function () {
    Recurrence::factory()->create();

    expect(Recurrence::count())->toBe(1);
});

test('recurrence can be soft deleted', function () {
    Redo::supportsSoftDeletes();

    $recurrence = Recurrence::factory()->create();

    $this->assertSoftDeleted($recurrence->fresh);
});