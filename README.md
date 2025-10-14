# Libphpsky

Libphpsky is a PHP library designed to interact with the Bluesky decentralized social media protocol. All types are generated from the Bluesky protocol schema, along with queries and procedures, ensuring everything is statically typed.

> **Note:** This is not an official library and is not affiliated with Bluesky.

## Table of Contents

-   [Installation](#installation)
-   [Documentation](#documentation)
-   [Features](#features)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

To install Libphpsky, use Composer:

```sh
composer require aazsamir/libphpsky
```

For integration with Laravel, use [`aazsamir/libphpsky-laravel`](https://github.com/aazsamir/libphpsky-laravel) package:

```sh
composer require aazsamir/libphpsky-laravel
```

For integration with Symfony, use [`aazsamir/libphpsky-symfony`](https://github.com/aazsamir/libphpsky-symfony) package:

```sh
composer require aazsamir/libphpsky-symfony
```

## Documentation

Check docs at [https://aazsamir.github.io/libphpsky/](https://aazsamir.github.io/libphpsky/).

### Usage

The default implementation handles authorization out of the box by providing `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables. If the session is stale, it will automatically refresh it.

```php
$resolveHandle = ResolveHandle::default();
$did = $resolveHandle->query('bsky.app')->did;

$getProfile = GetProfile::default();
$response = $getProfile->query($did);
```

On top of that, there is a meta client, which can be used to handle all possible endpoints.

```php
$client = new ATProtoMetaClient();
$resolved = $client->comAtprotoIdentityResolveHandle()->query('bsky.app');
```

Libphpsky also supports `\Amp\Http\Client\HttpClient` from [`amphp/http-client`](https://github.com/amphp/http-client) package out of the box.

```php
$client = ATProtoClientBuilder::default()->useAsync(true)->build();
$getProfile = new GetProfile($client);
$actors = ['bsky.app', 'steampowered.com'];
$futures = [];

foreach ($actors as $actor) {
    $futures[] = \Amp\async(fn() => $getProfile->query($actor));
}

[$errors, $profiles] = \Amp\Future\awaitAll($futures);
```

### Examples

[libphpsky-feed](https://github.com/aazsamir/libphpsky-feed) is an example project that uses libphpsky to serve a bluesky feed.

For more examples, check `examples` directory.

## Features

-   Comprehensive interaction with the ATProtocol
-   Statically typed queries, procedures and objects
-   Authorization and automatic session management
-   Query caching
-   Amphp client support
-   Subscriptions over WebSockets
-   Custom lexicons support

## Contributing

Contributions are welcome! Just make sure that phpstan, php-cs-fixer and phpunit pass.

## License

Libphpsky is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
