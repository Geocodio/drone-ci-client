<?php

namespace Geocodio\Drone\Tests;

use PHPUnit\Framework\TestCase;
use Geocodio\Drone\Drone;

class ErrorHandlingTest extends TestCase
{
    use InteractsWithAPI;


    public function testBadToken()
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);
        $this->expectExceptionMessage('401 Unauthorized');

        $drone = new Drone($this->getServerFromEnvironment(), 'BadToken');
        $drone->repoList();
    }
}
