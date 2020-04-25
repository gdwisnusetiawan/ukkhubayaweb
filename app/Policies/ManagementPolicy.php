<?php

namespace App\Policies;

use App\Management;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any managements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can view the management.
     *
     * @param  \App\User  $user
     * @param  \App\Management  $management
     * @return mixed
     */
    public function view(User $user, Management $management)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can create managements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can update the management.
     *
     * @param  \App\User  $user
     * @param  \App\Management  $management
     * @return mixed
     */
    public function update(User $user, Management $management)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can delete the management.
     *
     * @param  \App\User  $user
     * @param  \App\Management  $management
     * @return mixed
     */
    public function delete(User $user, Management $management)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can restore the management.
     *
     * @param  \App\User  $user
     * @param  \App\Management  $management
     * @return mixed
     */
    public function restore(User $user, Management $management)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the management.
     *
     * @param  \App\User  $user
     * @param  \App\Management  $management
     * @return mixed
     */
    public function forceDelete(User $user, Management $management)
    {
        //
    }
}
