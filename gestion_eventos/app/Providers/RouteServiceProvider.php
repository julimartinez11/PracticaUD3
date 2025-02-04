<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * La ruta "home" a la que se redirige a los usuarios después de iniciar sesión.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define las rutas del sistema.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Cargar rutas API con el prefijo "api" y el middleware "api"
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Cargar rutas web con el middleware "web"
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configura el limitador de peticiones para la API.
     */
    protected function configureRateLimiting()
    {
        // Si deseas definir límites de tasa, agrégalos aquí.
    }
}
