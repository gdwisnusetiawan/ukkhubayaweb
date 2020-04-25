<?php

namespace App\Policies;

use App\ManagementMember;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagementMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any management members.
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
     * Determine whether the user can view the management member.
     *
     * @param  \App\User  $user
     * @param  \App\ManagementMember  $managementMember
     * @return mixed
     */
    public function view(User $user, ManagementMember $managementMember)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can create management members.
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
     * Determine whether the user can update the management member.
     *
     * @param  \App\User  $user
     * @param  \App\ManagementMember  $managementMember
     * @return mixed
     */
    public function update(User $user, ManagementMember $managementMember)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can delete the management member.
     *
     * @param  \App\User  $user
     * @param  \App\ManagementMember  $managementMember
     * @return mixed
     */
    public function delete(User $user, ManagementMember $managementMember)
    {
        $positions = ['ketua', 'wakil ketua'];
        return $user->isAdmin() || $user->member->managementPermission($positions);
    }

    /**
     * Determine whether the user can restore the management member.
     *
     * @param  \App\User  $user
     * @param  \App\ManagementMember  $managementMember
     * @return mixed
     */
    public function restore(User $user, ManagementMember $managementMember)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the management member.
     *
     * @param  \App\User  $user
     * @param  \App\ManagementMember  $managementMember
     * @return mixed
     */
    public function forceDelete(User $user, ManagementMember $managementMember)
    {
        //
    }
}
