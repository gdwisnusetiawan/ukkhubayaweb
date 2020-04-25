<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Committee' => 'App\Policies\CommitteePolicy',
        'App\CommitteeMember' => 'App\Policies\CommitteeMemberPolicy',
        'App\Contact' => 'App\Policies\ContactPolicy',
        'App\Event' => 'App\Policies\EventPolicy',
        'App\Faculty' => 'App\Policies\FacultyPolicy',
        'App\Management' => 'App\Policies\ManagementPolicy',
        'App\ManagementMember' => 'App\Policies\ManagementMemberPolicy',
        'App\Member' => 'App\Policies\MemberPolicy',
        'App\Period' => 'App\Policies\PeriodPolicy',
        'App\Position' => 'App\Policies\PositionPolicy',
        'App\Profile' => 'App\Policies\ProfilePolicy',
        'App\Program' => 'App\Policies\ProgramPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
