<?php

namespace App\Providers;

use App\Interfaces\AdInterface;
use App\Interfaces\AdminNoteInterface;
use App\Interfaces\BannedInterface;
use App\Interfaces\ReportInterface;
use App\Interfaces\RequestInterface;
use App\Interfaces\UserBotInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\UserSettingInterface;
use App\Repositories\AdminNoteRepository;
use App\Repositories\AdRepository;
use App\Repositories\BannedRepository;
use App\Repositories\ReportRepository;
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
        $this->app->bind(ReportInterface::class, ReportRepository::class);
        $this->app->bind(BannedInterface::class, BannedRepository::class);
        $this->app->bind(AdminNoteInterface::class, AdminNoteRepository::class);
        $this->app->bind(AdInterface::class, AdRepository::class);
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
