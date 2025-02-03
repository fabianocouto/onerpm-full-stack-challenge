<?php

namespace App\Services\Isrc;

use App\Services\Isrc\Drivers\SpotifyDriver;
use App\Models\Isrc;
use App\Models\Track;

/**
 * IsrcService class
 */
final class IsrcService
{
    /**
     * @param Isrc $isrc
     * @return void
     */
    public static function sync(Isrc $isrc, $driver = 'spotify') : void
    {
        switch ($driver)
        {
            case 'spotify':
                SpotifyDriver::syncIsrc($isrc);
                break;
        }
    }
}
