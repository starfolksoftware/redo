<?php

namespace StarfolkSoftware\Redo;

enum FrequencyEnum: string
{
    CASE SECONDLY = 'SECONDLY';
    CASE MINUTELY = 'MINUTELY';
    CASE HOURLY = 'HOURLY';
    CASE DAILY = 'DAILY';
    CASE WEEKLY = 'WEEKLY';
    CASE MONTHLY = 'MONTHLY';
    CASE YEARLY = 'YEARLY';

    /**
     * Returns the values in an array.
     * 
     * @return array
     */
    public static function toArray(): array
    {
        return collect(self::cases())
            ->map(fn ($selfObj) => $selfObj->value)
            ->toArray();
    }
}