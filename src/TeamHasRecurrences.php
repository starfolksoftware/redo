<?php

namespace StarfolkSoftware\Redo;

trait TeamHasRecurrences
{
    /**
     * Get the recurrences associated with the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recurrences()
    {
        return $this->hasMany(Redo::recurrenceModel(), 'team_id');
    }
}