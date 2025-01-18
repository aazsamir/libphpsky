# Libphpsky

Libphpsky is a PHP library designed to interact with the Bluesky decentralized social media protocol. All types are generated from the Bluesky protocol schema, along with queries and procedures, ensuring everything is statically typed.

> **Note:** This is not an official library and is not affiliated with Bluesky.

## Table of Contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Features](#features)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

To install Libphpsky, use Composer:

```sh
composer require aazsamir/libphpsky
```

## Usage

Interact with the protocol using plain Atproto types:

```php
$createSession = new CreateSession();
$input = Input::new(
    identifier: $username,
    password: $password,
);
$response = $createSession->procedure($input);
$accessJwt = $response->accessJwt;

$resolveHandle = new ResolveHandle();
$response = $resolveHandle->query('bsky.app');
$did = $response->did;

$getProfile = new GetProfile();
$response = $getProfile->withAuth($accessJwt)->query($did);
```

Libphpsky also provides a client for a more streamlined experience. The default implementation handles authorization out of the box by providing `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables. If the session is stale, it will automatically refresh it.

```php
$resolveHandle = ResolveHandle::default();
$did = $resolveHandle->query('bsky.app')->did;

$getProfile = GetProfile::default();
$response = $getProfile->query($did);
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

-   Comprehensive interaction with the Bluesky protocol
-   Statically typed queries, procedures and objects
-   Authorization and automatic session management
-   Query caching
-   Amphp client support

## Contributing

Contributions are welcome! Just make sure that phpstan, php-cs-fixer and phpunit pass.

## License

Libphpsky is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
