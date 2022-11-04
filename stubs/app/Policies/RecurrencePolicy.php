<?php

namespace App\Policies;

use App\Models\Recurrence;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecurrencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any recurrences.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the recurrence.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Recurrence $recurrence)
    {
        return true;
    }

    /**
     * Determine whether the user can create recurrences.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the recurrence.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Recurrence $recurrence)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the recurrence.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recurrence $recurrence)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the recurrence.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recurrence $recurrence)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the recurrence.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recurrence $recurrence)
    {
        return true;
    }
}
