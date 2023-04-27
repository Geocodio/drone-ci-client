<?php

namespace Geocodio\Drone\Tests;

use PHPUnit\Framework\TestCase;
use Geocodio\Drone\Drone;

class DroneTest extends TestCase
{
    use InteractsWithAPI;

    /** @var Drone */
    private $drone;

    public function setUp(): void
    {
        parent::setUp();

        $this->drone = new Drone(
            $this->getServerFromEnvironment(),
            $this->getTokenFromEnvironment()
        );
    }

    public function testListRepos()
    {
        $repos = $this->drone->repoList();
        $this->assertIsArray($repos);
    }
}
