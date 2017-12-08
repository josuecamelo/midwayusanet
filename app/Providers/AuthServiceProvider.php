<?php

namespace App\Providers;


use App\Permission;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Route;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate,Guard $auth)
    {
        $this->registerPolicies($gate);

        $gate->before(function($user){
            if($user->is_admin == 1){
                return true;
            }
        });

        //Listando Todas as Permissões
        $perms = Permission::whereNotNull('route_name')->with('users')->get();
        foreach ($perms as $permission) {
            $gate->define($permission->route_name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }
}
