<?php

namespace App\Providers;


use App\Repository\Eloquent\AuditTrailRepository;
use App\Repository\Eloquent\BaseRepository;

use App\Repository\Eloquent\UserRepository;

use App\Repository\IAuditTrailRepository;
use App\Repository\IEloquentRepositoryInterface;

use App\Repository\IUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(IUserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(IAuditTrailRepository::class, AuditTrailRepository::class);







    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
