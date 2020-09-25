<?php

namespace Dgera\WorldDataRepo;

use Illuminate\Support\ServiceProvider;

class WorldDataRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/config/worlddatarepo.php' => config_path('/worlddatarepo.php'),
        ]);
        $this->publishes([
            __DIR__.'/Controllers/WorldController.php' => base_path('/app/Http/Controllers/WorldController.php'),
        ]);
        $this->publishes([
            __DIR__.'/models' => base_path('/app/Models/'),
        ]);
        $this->publishes([
            __DIR__.'/migrations' => base_path('/database/migrations/WorldDataMigrations/'),
        ]);
        $this->publishes([
            __DIR__.'/seeds/WorldData.php' => base_path('/database/seeder/WorldData.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->make('Dgera\WorldDataRepo\Controllers\WorldController');
    }
}