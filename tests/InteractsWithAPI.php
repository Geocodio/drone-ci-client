<?php

namespace Geocodio\Drone\Tests;

use InvalidArgumentException;

trait InteractsWithAPI
{
    protected function getTokenFromEnvironment(): string
    {
        $token = getenv('DRONE_TOKEN');

        if (!$token) {
            throw new InvalidArgumentException('Please specify Drone authentication token using the "DRONE_TOKEN" environment variable');
        }

        return $token;
    }

    protected function getServerFromEnvironment(): ?string {
        return getenv('DRONE_SERVER') ?? null;
    }
}
