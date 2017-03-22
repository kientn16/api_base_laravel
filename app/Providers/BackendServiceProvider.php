<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
    public function boot()
    {

    }

    public function register()
    {
        $models = array(
            'User'
        );

        foreach ($models as $model)
        {
            $this->app->bind("App\Repositories\Interfaces\\". $model . "Repository", "App\Repositories\Eloquents\Db" . $model . "Repository");
        }
    }
}
