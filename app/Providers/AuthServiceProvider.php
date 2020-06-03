<?php

namespace GerenciamentoVendas\Providers;

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
        // 'GerenciamentoVendas\Model' => 'GerenciamentoVendas\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        //analisa se ele é admin sem precisar ir para a proxima função abaixo.
        /*Gate::before(function(){
            if ($user->role == User::ROLE_ADMIN) {
                return true;
            }
        });*/

        /*
        Gate::define('is-admin', function ($user) {
            return $user->role == User::ROLE_ADMIN; //true - vai ter habilidade (acesso)
        });*/

        /*Gate::define('update-post', function ($user, $post) {
            return $post->user_id == $user->id;
        });*/

        /* mesma tecnica de cima porem com admin acessando update de todos.
        Gate::define('update-post', function ($user, $post) {
            return $user->role == User::ROLE_ADMIN || $post->user_id == $user->id;
        });*/
    }
}
