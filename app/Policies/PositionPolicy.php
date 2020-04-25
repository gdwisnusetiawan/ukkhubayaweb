<?php

namespace App\Policies;

use App\Position;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any positions.
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
     * Determine whether the user can view the position.
     *
     * @param  \App\User  $user
     * @param  \App\Position  $position
     * @return mixed
     */
    public function view(User $user, Position $position)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can create positions.
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
     * Determine whether the user can update the position.
     *
     * @param  \App\User  $user
     * @param  \App\Position  $position
     * @return mixed
     */
    public function update(User $user, Position $position)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can delete the position.
     *
     * @param  \App\User  $user
     * @param  \App\Position  $position
     * @return mixed
     */
    public function delete(User $user, Position $position)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can restore the position.
     *
     * @param  \App\User  $user
     * @param  \App\Position  $position
     * @return mixed
     */
    public function restore(User $user, Position $position)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the position.
     *
     * @param  \App\User  $user
     * @param  \App\Position  $position
     * @return mixed
     */
    public function forceDelete(User $user, Position $position)
    {
        //
    }
}
