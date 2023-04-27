<?php

namespace Geocodio\Drone;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Geocodio\Drone\Drone
 */
class DroneFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'drone';
    }
}
