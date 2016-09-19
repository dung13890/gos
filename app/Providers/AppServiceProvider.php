<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Urls\UrlBuilderFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') === 'local' || env('APP_ENV') === 'dev') {
            $this->app->register(\Lord\Laroute\LarouteServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }

        $this->app->singleton('glide', function () {
            return ServerFactory::create([
                'source' => \Storage::disk('image')->getDriver(),
                'cache' => \Storage::disk('image')->getDriver(),
                'cache_path_prefix' => 'cache',
                'base_url' => null,
                'max_image_size' => 2000 * 2000,
                'presets' => [
                    'thumbnail' => [
                        'w' => 100,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    'small' => [
                        'w' => 320,
                        'h' => 240,
                        'fit' => 'crop',
                    ],
                    'medium' => [
                        'w' => 640,
                        'h' => 480,
                        'fit' => 'crop',
                    ],
                    'large' => [
                        'w' => 800,
                        'h' => 600,
                        'fit' => 'crop',
                    ],
                ],
                'response' => new LaravelResponseFactory(),
            ]);
        });

        $this->app->singleton('glide.builder', function () {
            return UrlBuilderFactory::create(null, env('GLIDE_SIGNKEY'));
        });

        $this->app->bind(
            \App\Contracts\Services\UploadService::class,
            \App\Services\UploadServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\UserService::class,
            \App\Services\UserServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\BranchService::class,
            \App\Services\BranchServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\LocationService::class,
            \App\Services\LocationServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\UnitService::class,
            \App\Services\UnitServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\ManufacturerService::class,
            \App\Services\ManufacturerServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\PositionService::class,
            \App\Services\PositionServiceJob::class
        );

        $this->app->bind(
            \App\Contracts\Services\RoomService::class,
            \App\Services\RoomServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\PermissionService::class,
            \App\Services\PermissionServiceJob::class
        );
        $this->app->bind(
            \App\Contracts\Services\RoleService::class,
            \App\Services\RoleServiceJob::class
        );

        $this->app->bind(
            \App\Contracts\Services\WarehouseService::class,
            \App\Services\WarehouseServiceJob::class
        );

        $this->app->bind(
            \App\Contracts\Services\CustomerGroupService::class,
            \App\Services\CustomerGroupServiceJob::class
        );

        $this->app->bind(
            \App\Contracts\Services\CategoryService::class,
            \App\Services\CategoryServiceJob::class
        );

        $this->composers();
    }

    public function composers()
    {
        view()->composer('backend.*', function ($view) {
            $view->with('currentUser', \Auth::user());
        });
    }
}
