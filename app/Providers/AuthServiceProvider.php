<?php

namespace App\Providers;

use App\Perfil;
use App\Policies\PerfilPolicy;
use App\Policies\ReceitaPolicy;
use App\Receita;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Receita::class => ReceitaPolicy::class,
        Perfil::class => PerfilPolicy::class,
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
