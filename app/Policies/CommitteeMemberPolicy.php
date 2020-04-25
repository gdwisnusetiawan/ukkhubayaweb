<?php

namespace App\Policies;

use App\CommitteeMember;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommitteeMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any committee members.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the committee member.
     *
     * @param  \App\User  $user
     * @param  \App\CommitteeMember  $committeeMember
     * @return mixed
     */
    public function view(User $user, CommitteeMember $committeeMember)
    {
        return true;
    }

    /**
     * Determine whether the user can create committee members.
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
     * Determine whether the user can update the committee member.
     *
     * @param  \App\User  $user
     * @param  \App\CommitteeMember  $committeeMember
     * @return mixed
     */
    public function update(User $user, CommitteeMember $committeeMember)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->committeePermission($positions);
    }

    /**
     * Determine whether the user can delete the committee member.
     *
     * @param  \App\User  $user
     * @param  \App\CommitteeMember  $committeeMember
     * @return mixed
     */
    public function delete(User $user, CommitteeMember $committeeMember)
    {
        $positions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara'];
        return $user->isAdmin() || $user->member->committeePermission($positions);
    }

    /**
     * Determine whether the user can restore the committee member.
     *
     * @param  \App\User  $user
     * @param  \App\CommitteeMember  $committeeMember
     * @return mixed
     */
    public function restore(User $user, CommitteeMember $committeeMember)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the committee member.
     *
     * @param  \App\User  $user
     * @param  \App\CommitteeMember  $committeeMember
     * @return mixed
     */
    public function forceDelete(User $user, CommitteeMember $committeeMember)
    {
        //
    }
}
