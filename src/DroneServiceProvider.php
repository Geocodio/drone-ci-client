<?php

namespace Geocodio\Drone;

use Illuminate\Support\ServiceProvider;

class DroneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/drone.php' => config_path('drone.php'),
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/drone.php', 'drone');

        $this->app->bind(Drone::class, function () {
            return (new Drone(config('drone.server'), config('drone.token')));
        });

        $this->app->alias(Drone::class, 'drone');
    }
}
