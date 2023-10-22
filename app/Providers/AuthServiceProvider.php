<?php

namespace App\Providers;

use App\Policies\PublicacaoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\User' => 'App\Policies\UserPolicy',
         'App\Models\Publicacao' => 'App\Policies\PublicacaoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('publicar', [PublicacaoPolicy::class, 'create']);
        Gate::define('store-pub', [PublicacaoPolicy::class, 'store']);
        Gate::define('edit-pub', [PublicacaoPolicy::class, 'edit']);
        Gate::define('update-pub', [PublicacaoPolicy::class, 'update']);
    }
}
