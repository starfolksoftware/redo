<?php

namespace StarfolkSoftware\Redo;

use Recurr\Rule;

trait Recurs
{
    /**
     * Makes a calendar event model recurrable.
     *
     * @param  string  $frequency
     * @param  int  $interval
     * @param  \DateTime  $startsAt
     * @param  \DateTime|int|null  $ends
     * @return void
     */
    public function makeRecurrable(string $frequency, int $interval, \DateTime $startsAt, $ends = null)
    {
        $this->ensuresFrequencyIsSupported($frequency);

        $recurrence = Redo::newRecurrenceModel();

        $recurrence->frequency = $frequency;
        $recurrence->interval = $interval;
        $recurrence->starts_at = $startsAt;

        if ($ends instanceof \DateTime) {
            $recurrence->ends_at = $ends;
        } elseif (is_int($ends)) {
            $recurrence->ends_after = $ends;
        }

        $this->recurrence()->save($recurrence);
    }

    /**
     * Retrieves the recurrence of the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function recurrence()
    {
        return $this->morphOne(Redo::$recurrenceModel, 'recurrable');
    }

    /**
     * Updates the model's recurrence.
     *
     * @param  string  $frequency
     * @param  int  $interval
     * @param  \DateTime  $startsAt
     * @param  \DateTime|int|null  $ends
     * @return void
     */
    public function updateRecurrence(string $frequency, int $interval, \DateTime $startsAt, $ends = null)
    {
        $this->ensuresFrequencyIsSupported($frequency);

        $data = [
            'frequency' => $frequency,
            'interval' => $interval,
            'starts_at' => $startsAt,
        ];

        if ($ends instanceof \DateTime) {
            $data['ends_at'] = $ends;
            $data['ends_after'] = null;
        } elseif (is_int($ends)) {
            $data['ends_after'] = $ends;
            $data['ends_at'] = null;
        }

        $this->recurrence->update($data);
    }

    /**
     * Pauses the model's recurrence.
     *
     * @param  bool  $value
     * @return void
     */
    public function pauseRecurrence(bool $value = true)
    {
        $this->recurrence->update([
            'status' => $value ? 'paused' : 'active',
        ]);
    }

    /**
     * Checks if recurrence is active.
     *
     * @return bool
     */
    public function recurrenceIsActive(): bool
    {
        return ($this->recurrence?->starts_at >= now()) &&
            $this->recurrence?->status === 'active' && (
                (! is_null($this->recurrence->ends_at) && ($this->recurrence->ends_at >= now())) ||
                (! is_null($this->recurrence->ends_after) && $this->nextRecurrence()) ||
                (is_null($this->recurrence->ends_at) && is_null($this->recurrence->ends_after))
            );
    }

    /**
     * Returns recurrence rule.
     *
     * @return \Recurr\Rule
     */
    public function recurrenceRule(): Rule
    {
        $rule = (new Rule)
            ->setStartDate($this->recurrence->starts_at)
            ->setTimezone(Redo::$timezone)
            ->setFreq($this->recurrence->frequency)
            ->setInterval($this->recurrence->interval);

        if (count($this->recurrence->day ?? []) > 0) {
            $rule->setByDay($this->recurrence->days);
        }

        if (! is_null($this->recurrence->ends_at)) {
            $rule->setUntil($this->recurrence->ends_at);
        } elseif (! is_null($this->recurrence->ends_after)) {
            $rule->setCount($this->recurrence->ends_after);
        }

        return $rule;
    }

    /**
     * Returns recurrence in datetime objects.
     *
     * @return \Recurr\RecurrenceCollection|\Recurr\Recurrence[]
     */
    public function recurrences()
    {
        $config = new \Recurr\Transformer\ArrayTransformerConfig();
        $config->enableLastDayOfMonthFix();

        $transformer = new \Recurr\Transformer\ArrayTransformer();
        $transformer->setConfig($config);

        return $transformer->transform($this->recurrenceRule());
    }

    /**
     * Returns current recurrence.
     *
     * @return mixed
     */
    public function currentRecurrence()
    {
        if (! $this->recurrenceIsActive()) {
            return null;
        }

        return $this->recurrences()->current()?->getStart();
    }

    /**
     * Returns the next recurrence.
     *
     * @return mixed
     */
    public function nextRecurrence()
    {
        return $this->recurrences()->next()?->getStart();
    }

    /**
     * Returns the first recurrence.
     *
     * @return mixed
     */
    public function firstRecurrence()
    {
        return $this->recurrences()->first()?->getStart();
    }

    /**
     * Returns the last recurrence.
     *
     * @return mixed
     */
    public function lastRecurrence()
    {
        return $this->recurrences()->last()?->getStart();
    }

    /**
     * Ensure provided frequency is supported.
     *
     * @param  string  $frequency
     * @return void
     *
     * @throws \Exception
     */
    public function ensuresFrequencyIsSupported(string $frequency)
    {
        if (! FrequencyEnum::tryFrom($frequency)) {
            throw new \Exception("{$frequency} is not supported by Redo(recurrence package)");
        }
    }
}
