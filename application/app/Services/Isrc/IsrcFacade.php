<?php

namespace App\Services\Isrc;

use Illuminate\Support\Facades\Facade;

/**
 * IsrcFacade Class
 */
class IsrcFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return IsrcService::class;
    }
}
