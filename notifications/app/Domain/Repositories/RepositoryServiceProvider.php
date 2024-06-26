<?php


namespace App\Domain\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app->bind(
            'App\Domain\Repositories\NotificationRepository',
            'App\Domain\Repositories\NotificationRepositoryEloquent');
    }
}
