<?php

namespace App\Services\Isrc\Contracts;

use App\Models\Isrc;

/**
 * ClientInterface Interface
 */
interface ClientInterface
{
    /**
     * @param  Isrc $isrc
     * @return mixed
     */
    public function searchIsrc(Isrc $isrc);
}
