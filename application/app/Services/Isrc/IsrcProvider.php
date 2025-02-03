<?php

namespace App\Services\Isrc;

use Illuminate\Support\ServiceProvider;

final class IsrcProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('services.isrc', function ($app) {
            return new IsrcService;
        });
    }
}
