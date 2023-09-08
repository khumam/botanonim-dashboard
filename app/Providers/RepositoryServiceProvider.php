<?php

namespace App\Providers;

use App\Interfaces\CourseInterface;
use App\Interfaces\RequestInterface;
use App\Interfaces\UserBotInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\UserSettingInterface;
use App\Repositories\CourseRepository;
use App\Repositories\RequestRepository;
use App\Repositories\UserBotRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserSettingRepository;
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
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(UserSettingInterface::class, UserSettingRepository::class);
        $this->app->bind(RequestInterface::class, RequestRepository::class);
        $this->app->bind(UserBotInterface::class, UserBotRepository::class);
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
