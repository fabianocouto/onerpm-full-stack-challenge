<?php

namespace App\Services\Isrc\Contracts;

use App\Models\Isrc;
use App\Models\Track;

/**
 * DriverInterface Interface
 */
interface DriverInterface
{
    /**
     * @param  Isrc $isrc
     * @return Track
     */
    public static function syncIsrc(Isrc $isrc);
}
