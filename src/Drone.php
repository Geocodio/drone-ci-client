<?php

namespace Geocodio\Drone;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Drone extends Client {

    public function __construct(string $server, string $token, array $config = [])
    {
        $defaultConfig = [
            'base_uri' => $server . '/api/',
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ];

        parent::__construct(array_merge($defaultConfig, $config));
    }

    public function builds(string $owner, string $name)
    {
        $path = sprintf('repos/%s/%s/builds', urlencode($owner), urlencode($name));
        return $this->formatResponse($this->get($path));
    }

    public function repo(string $owner, string $name)
    {
        $path = sprintf('repos/%s/%s', urlencode($owner), urlencode($name));
        return $this->formatResponse($this->get($path));
    }

    public function repoList()
    {
        return $this->formatResponse($this->get('user/repos'));
    }

    public function build(string $owner, string $name, int $num)
    {
        $path = sprintf('repos/%s/%s/builds/%d', $owner, $name, $num);
        return $this->formatResponse($this->get($path));
    }

    public function buildLast(string $owner, string $name, string $branch = null)
    {
        $query = [];
        $path = sprintf('repos/%s/%s/builds/%s', $owner, $name, "latest");

        if ($branch) {
            $query['branch'] = $branch;
        }

        return $this->formatResponse($this->get($path, ['query' => $query]));
    }

    public function buildList(string $owner, string $name, array $options = [])
    {
        $path = sprintf('repos/%s/%s/builds', $owner, $name);
        return $this->formatResponse($this->get($path, ['query' => $options]));
    }

    public function promote(string $namespace, string $name, int $build, string $target, array $options = [])
    {
        $options['target'] = $target;

        $path = sprintf('repos/%s/%s/builds/%d/promote', $namespace, $name, $build);
        return $this->formatResponse($this->post($path, ['query' => $options]));
    }

    public function logs(string $owner, string $name, int $build, string $stage, int $step)
    {
        $path = sprintf('repos/%s/%s/builds/%d/logs/%d/%d', $owner, $name, $build, $stage, $step);
        return $this->formatResponse($this->get($path));
    }

    private function formatResponse(ResponseInterface $response)
    {
        return json_decode($response->getBody());
    }

}
