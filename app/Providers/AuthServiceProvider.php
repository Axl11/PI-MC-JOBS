<?php

namespace App\Providers;

use App\Models\Archivo;
use App\Models\Solicitude;
use App\Models\Team;
use App\Models\User;
use App\Policies\SolicitudePolicy;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
        Solicitude::class => SolicitudePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Gate para evitar que se haga spam de correos si tu no eres el usuario que creó esa solicitud
         * Se compara si el ID del usuario corresponde al ID que tiene relacionado el registro en la tabla
         * solicitudes. Estos metodos retornan un TRUE o FALSE
         */

        Gate::define('enviar-correo', function (User $user, Solicitude $solicitude){
            return $user->id === $solicitude->user_id;
        });

        /** Gates relacionados con Archivos */
        
        Gate::define('edita-archivo', function (User $user, Archivo $archivo){
            return $user->id === $archivo->solicitude->user_id;
        });
        
        Gate::define('descargar-archivo', function (User $user, Archivo $archivo){
            return $user->id === $archivo->solicitude->user_id;
        });

        // Gate::define('edita-solicitude', function (User $user, Solicitude $solicitude){
        //     return $user->id === $solicitude->user_id;
        // });
    }
}
