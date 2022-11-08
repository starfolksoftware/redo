<?php

namespace StarfolkSoftware\Redo;

enum FrequencyEnum: string
{
    case SECOND = 'SECONDLY';
    case MINUTE = 'MINUTELY';
    case HOUR = 'HOURLY';
    case DAY = 'DAILY';
    case WEEK = 'WEEKLY';
    case MONTH = 'MONTHLY';
    case YEAR = 'YEARLY';

    /**
     * Returns the values in an array.
     *
     * @return array
     */
    public static function toArray(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($selfObj) => [$selfObj->value => $selfObj->name])
            ->toArray();
    }
}
