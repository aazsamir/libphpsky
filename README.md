# Libphpsky

Libphpsky is a PHP library designed to interact with the Bluesky decentralized social media protocol.
All types are generated from the Bluesky protocol schema, along with queries and procedures, and everything is statically typed.

This is not an official library and is not affiliated with Bluesky.

## Table of Contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Features](#features)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

To install Libphpsky, you can use Composer:

```sh
composer require aazsamir/libphpsky
```

## Usage

Using plain bluesky types, you can interact with the protocol like this

```php
$createSession = new CreateSession();
$input = Input::new(
    identifier: $username,
    password: $password,
    authFactorToken: 'testing-purpose',
    allowTakendown: false,
);
$response = $createSession->procedure($input);
$accessJwt = $response->accessJwt;

$resolveHandle = new ResolveHandle();
$response = $resolveHandle->query('bsky.app');
$did = $response->did;

$getProfile = new GetProfile();
$response = $getProfile->withAuth($accessJwt)->query($did);
```

Although, it seems a bit verbose. Libphpsky provides a client.

Default implementation handles authorization out of the box, by providing `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables.
Also, if session is stale, it will automatically refresh it.

```php
$resolveHandle = ResolveHandle::default();
$did = $resolveHandle->query('bsky.app')->did;

$getProfile = GetProfile::default();
$response = $getProfile->query($did);
```

You can override default client, by providing your own implementation.

```php
$client = new ATProtoClient(new \GuzzleHttp\Client());
$resolveHandle = ResolveHandle::default()->withClient($client)->query('bsky.app');
// or
$resolveHandle = (new ResolveHandle($client))->query('bsky.app');
```

This can be also typehinted and injected by DI container of your choice.

```php
public function __construct(private ResolveHandle $resolveHandle) {}
```

On top of that, there is a meta client, which can be used to handle all possible endpoints.

```php
$client = new ATProtoMetaClient();
$resolved = $client->comAtprotoIdentityResolveHandle('bsky.app');
```

Libphpsky also supports `\Amp\Http\Client\HttpClient` from [`amphp/http-client`](https://github.com/amphp/http-client) package out of the box.

```php
$client = ATProtoClientBuilder::default()->useAsync(true)->build();
$getProfile = new GetProfile($client);
$actors = ['bsky.app', 'steampowered.com'];
$futures = [];

foreach ($actors as $actor) {
    $futures[] = \Amp\async(fn() => $this->getProfile->query($actor));
}

[$errors, $profiles] = \Amp\Future\awaitAll($futures);
```

### Examples

Check `examples` directory for more examples.

## Features

-   All types generated from the Bluesky protocol schema
-   Queries
-   Procedures
-   Authorization
-   Automatic session refresh
-   Query caching
-   Amphp client support

## Contributing

Pull requests are welcome :)
Just make sure that phpstan, php-cs-fixer and phpunit pass.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
