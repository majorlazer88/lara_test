<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Recipient;
use App\Policies\RecipientPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        // Recipient::class => RecipientPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-recipient', function (User $user, Recipient $recipient) {
        //     return $user->id === $recipient->user_id;
        // });

        // Gate::define('update-recipient', [RecipientPolicy::class, 'update']);
    }
}
