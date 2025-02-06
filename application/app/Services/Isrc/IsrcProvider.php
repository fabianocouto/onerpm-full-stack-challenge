<?php

namespace App\Services\Isrc;

use App\Services\Isrc\Drivers\Clients\SpotifyClient;
use App\Services\Isrc\Drivers\SpotifyDriver;
use Illuminate\Support\ServiceProvider;

class IsrcProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(IsrcService::class, function ($app) {
            $spotifyClient = new SpotifyClient();
            $spotifyDriver = new SpotifyDriver($spotifyClient);
            return new IsrcService($spotifyDriver);
        });
    }
}
