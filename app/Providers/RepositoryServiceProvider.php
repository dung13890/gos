<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],
        'branch' => [
            \App\Contracts\Repositories\BranchRepository::class,
            \App\Repositories\BranchRepositoryEloquent::class,
        ],
        'location' => [
            \App\Contracts\Repositories\LocationRepository::class,
            \App\Repositories\LocationRepositoryEloquent::class,
        ],
        'Position' => [
            \App\Contracts\Repositories\PositionRepository::class,
            \App\Repositories\PositionRepositoryEloquent::class,
        ],
    ];
    
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
