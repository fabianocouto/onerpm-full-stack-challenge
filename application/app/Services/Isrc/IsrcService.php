<?php

namespace App\Services\Isrc;

use App\Services\Isrc\Drivers\SpotifyDriver;
use App\Models\Isrc;

/**
 * IsrcService Class
 */
class IsrcService
{
    /**
     * SpotifyDriver
     *
     * @var App\Services\Isrc\Drivers\SpotifyDriver
     */
    protected $spotifyDriver;

    /**
     * IsrcService Class Constructor
     *
     * @param SpotifyDriver $spotifyDriver
     */
    public function __construct(SpotifyDriver $spotifyDriver)
    {
        $this->spotifyDriver = $spotifyDriver;
    }

    /**
     * @param Isrc $isrc
     * @param string $driver [Options: spotify]
     * @return bool
     */
    public function sync(Isrc $isrc, $driver = 'spotify') : bool
    {
        switch ($driver)
        {
            case 'spotify':
                return $this->spotifyDriver->syncIsrc($isrc);
                break;
        }

        return false;
    }
}
