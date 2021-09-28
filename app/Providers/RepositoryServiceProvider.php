<?php

namespace App\Providers;


use App\Repository\Eloquent\AuditTrailRepository;
use App\Repository\Eloquent\BaseRepository;

use App\Repository\Eloquent\ContentRepository;
use App\Repository\Eloquent\ResourceRepository;
use App\Repository\Eloquent\UserRepository;

use App\Repository\Eloquent\UserRolesRepository;
use App\Repository\Eloquent\UserRolesResourcesRepository;
use App\Repository\IAuditTrailRepository;
use App\Repository\IContentRepositoryInterface;
use App\Repository\IEloquentRepositoryInterface;

use App\Repository\IResourcesRepository;
use App\Repository\IUserRepositoryInterface;
use App\Repository\IUserRolesRepository;
use App\Repository\IUserRolesResourcesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return voidB
     */
    public function register()
    {
       // echo "meme";die();

        $this->app->bind(IEloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(IUserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(IAuditTrailRepository::class, AuditTrailRepository::class);
        $this->app->bind(IUserRolesRepository::class, UserRolesRepository::class);
        $this->app->bind(IResourcesRepository::class, ResourceRepository::class);
        $this->app->bind(IUserRolesResourcesRepository::class, UserRolesResourcesRepository::class);
        $this->app->bind(IContentRepositoryInterface::class, ContentRepository::class);










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
