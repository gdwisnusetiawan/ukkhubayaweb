<?php

namespace App\Policies;

use App\Committee;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommitteePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any committees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the committee.
     *
     * @param  \App\User  $user
     * @param  \App\Committee  $committee
     * @return mixed
     */
    public function view(User $user, Committee $committee)
    {
        return true;
    }

    /**
     * Determine whether the user can create committees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->committeePermission($positions);
    }

    /**
     * Determine whether the user can update the committee.
     *
     * @param  \App\User  $user
     * @param  \App\Committee  $committee
     * @return mixed
     */
    public function update(User $user, Committee $committee)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->committeePermission($positions);
    }

    /**
     * Determine whether the user can delete the committee.
     *
     * @param  \App\User  $user
     * @param  \App\Committee  $committee
     * @return mixed
     */
    public function delete(User $user, Committee $committee)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->committeePermission($positions);
    }

    /**
     * Determine whether the user can restore the committee.
     *
     * @param  \App\User  $user
     * @param  \App\Committee  $committee
     * @return mixed
     */
    public function restore(User $user, Committee $committee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the committee.
     *
     * @param  \App\User  $user
     * @param  \App\Committee  $committee
     * @return mixed
     */
    public function forceDelete(User $user, Committee $committee)
    {
        //
    }
}
