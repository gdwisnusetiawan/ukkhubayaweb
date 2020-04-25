<?php

namespace App\Policies;

use App\Period;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any periods.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can view the period.
     *
     * @param  \App\User  $user
     * @param  \App\Period  $period
     * @return mixed
     */
    public function view(User $user, Period $period)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can create periods.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can update the period.
     *
     * @param  \App\User  $user
     * @param  \App\Period  $period
     * @return mixed
     */
    public function update(User $user, Period $period)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can delete the period.
     *
     * @param  \App\User  $user
     * @param  \App\Period  $period
     * @return mixed
     */
    public function delete(User $user, Period $period)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can restore the period.
     *
     * @param  \App\User  $user
     * @param  \App\Period  $period
     * @return mixed
     */
    public function restore(User $user, Period $period)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the period.
     *
     * @param  \App\User  $user
     * @param  \App\Period  $period
     * @return mixed
     */
    public function forceDelete(User $user, Period $period)
    {
        //
    }
}
