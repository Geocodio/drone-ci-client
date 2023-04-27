# Drone CI Client

> Simple, lightweight PHP client for [Drone CI](https://www.drone.io)

<!-- toc -->

- [Installation](#installation)
- [Usage](#usage)
- [Usage with Laravel](#usage-with-laravel)
- [Testing](#testing)
- [Changelog](#changelog)
- [Security](#security)
- [License](#license)

<!-- tocstop -->

## Installation

You can install the package via composer:

```bash
$ composer require geocodio/drone-ci-client
```

> Using [Laravel](https://laravel.com)? Great! There's an optional Laravel service provider, for easy integration into your app.

## Usage
```php
$server = 'https://my-drone-ci-server.com';
$token = 'MyDroneAuthenticationToken';

$client = new Geocodio\Drone\Drone($server, $token);

$client->builds(string $owner, string $name);
$client->repo(string $owner, string $name);
$client->repoList();
$client->build(string $owner, string $name, int $num);
$client->buildLast(string $owner, string $name, string $branch = null);
$client->buildList(string $owner, string $name, array $options = []);
$client->promote(string $namespace, string $name, int $build, string $target, array $options = []);
$client->logs(string $owner, string $name, int $build, string $stage, int $step);

```

## Usage with Laravel

This library works well without Laravel, but if you happen to be using Laravel you can enjoy a few Laravel-specific features.

The package will be auto-discovered by newer Laravel versions, so the only thing left to do is to publish the config file

```
php artisan vendor:publish --provider="Geocodio\Drone\DroneServiceProvider"
```

You can now go ahead and edit your config file at `config/drone.php`.

You will now be able to use the `Drone` facade, or [dependency inject](https://laravel.com/docs/10.x/container) the fully-configured `Drone` class.

```php
// Using facade
use Drone;

$builds = Drone::builds(string $owner, string $name);
```

```php
// Using dependency injection
use Geocodio\Drone\Drone;

class SomeController {
  public function __construct(Drone $drone) {
      $builds = $drone->builds(string $owner, string $name);
  }
}
```

## Testing

```bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email security@geocod.io instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
