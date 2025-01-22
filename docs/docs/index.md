# Getting started

Libphpsky is a PHP library for interacting with AT Protocol.

## Installation

You can install the package via composer:

```bash
composer require aazsamir/libphpsky
```

If you are using Laravel, you can use the [libphpsky-laravel](https://github.com/aazsamir/libphpsky-laravel) package.

```bash
composer require aazsamir/libphpsky-laravel
```

If you are using Symfony, you can use the [libphpsky-symfony](https://github.com/aazsamir/libphpsky-symfony) package.

```bash
composer require aazsamir/libphpsky-symfony
```

## Usage

Get list of posts from a `bsky.app` user:

```php
<?php
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

$client = new ATProtoMetaClient();
$resolved = $client->comAtprotoIdentityResolveHandle()->query('bsky.app');
$posts = $client->appBskyFeedGetAuthorFeed()->query($resolve->did);

var_dump($posts);
```

Using the `ATProtoMetaClient` is the easiest way to interact with the AT Protocol. Note that the names of methods are coming directly from the AT Protocol definition.

`com.atproto.identity.resolveHandle` -> `comAtprotoIdentityResolveHandle`

However, you can also use plain libphpsky types:

```php
<?php
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\GetAuthorFeed;

$resolveHandle = ResolveHandle::default();
$resolved = $resolveHandle->query('bsky.app');

$getAuthorFeed = GetAuthorFeed::default();
$posts = $getAuthorFeed->query($resolved->did);

var_dump($posts);
```

## Authorization

Most of the ATProto methods require authorization. Default implementation handles this for you, you only need to provide `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables.
> You should use an app password instead of your main password. [Learn more](https://atproto.com/specs/xrpc#authentication)

If you want to handle authorization by yourself, you need to obtain a JWT token and pass it to the client:

```php
<?php
use Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession;
use Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfile\GetProfile;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

$createSession = CreateSession\CreateSession::default();
$input = CreateSession\Input::new(
    login: 'yourlogin.bsky.social',
    password: 'yourpassword',
)

$session = $createSession->procedure($input);

$getProfile = GetProfile::default();
$profile = $getProfile->withAuth($session->accessJwt)->query('bsky.app');

// or directly to meta client
$client = new ATProtoMetaClient(token: $session->accessJwt);
```

> You can also provide your own client implementation, to handle authorization on a different layer. See the [Client](client.md) section for more details.