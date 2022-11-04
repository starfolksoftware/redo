<?php

use StarfolkSoftware\Redo\Redo;

it('can disable migrations', function () {
    Redo::ignoreMigrations();

    expect(Redo::$runsMigrations)->toBeFalse();
});

it('can update recurrence model', function () {
    Redo::useRecurrenceModel('App\\Models\\RecurrenceTestModel');

    expect(Redo::$recurrenceModel)->toBe('App\\Models\\RecurrenceTestModel');
});

it('can update recurrence table name', function () {
    Redo::useRecurrencesTableName('recurrences_table');

    expect(Redo::$recurrencesTableName)->toBe('recurrences_table');
});

it('can update timezone to be used by Redo package', function () {
    Redo::useTimezone('Continent/Country');

    expect(Redo::$timezone)->toBe('Continent/Country');
});

it('can turn on support for soft delete', function () {
    Redo::supportsSoftDeletes();

    expect(Redo::$supportsSoftDeletes)->toBeTrue();
});

it('can turn on support for teams', function () {
    Redo::supportsTeams();

    expect(Redo::$supportsTeams)->toBeTrue();
});
