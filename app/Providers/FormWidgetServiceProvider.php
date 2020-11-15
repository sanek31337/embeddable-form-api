<?php

namespace App\Providers;

use App\Services\FormWidgetService;
use Illuminate\Support\ServiceProvider;

class FormWidgetServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("FormWidgetService", FormWidgetService::class);
    }

    public function boot()
    {

    }
}
