# Client

Every query and procedure calls a `ATProtoClientInterface` to send request.

## Builder

You may build a client by yourself, using `ATProtoClientBuilder`:

```php
<?php
use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

// use default implementation
$client = ATProtoClientBuilder::default();
// or build your own
$client = ATProtoClientBuilder::default()
    ->authConfig(new AuthConfig('login', 'password'))
    ->sessionStore(new MemorySessionStore())
    ->useAsync(true)
    ->useQueryCache(true)
    ->cache(new FilesystemAdapter())
    ->build();

// pass it as a dependency
$resolveHandle = new ResolveHandle($client);
// or use withClient method
$resolveHandle = (new ResolveHandle())->withClient($client);
// if you prefer meta client
$metaClient = new ATProtoMetaClient($client);
```

## Custom client

If you need to bring your own implementation, you can implement `ATProtoClientInterface`:

```php
<?php
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class MyClient implements ATProtoClientInterface
{
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        // ...
    }
}
```

## Decorators

You can extend your client with existing decorators:

```php
<?php
use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Client\AuthAwareClient;
use Aazsamir\Libphpsky\Client\ErrorAwareClient;
use Aazsamir\Libphpsky\Client\QueryCacheClient;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;

$client = new AuthAwareClient(
    decorated: new ErrorAwareClient(
        decorated: new QueryCacheClient(
            decorated: new MyClient(),
        ),
    ),
    authConfig: new AuthConfig('login', 'password'),
    sessionStore: new MemorySessionStore(),
)
```

## Amphp support

Libphpsky provides client with [amphp](https://github.com/amphp/amp) support. You can use `AmphpClientAdapter`:

```php
<?php
use Aazsamir\Libphpsky\Client\AmphpClientAdapter;
use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Amp\Http\Client\HttpClientBuilder;

// using builder
$client = ATProtoClientBuilder::default()
    ->useAsync(true)
    ->build();

// or using adapter
$client = new AmphpClientAdapter(
    HttpClientBuilder::buildDefault(),
);

$getProfile = new GetProfile($client);
$actors = ['bsky.app', 'steampowered.com'];
$futures = [];

foreach ($actors as $actor) {
    $futures[] = \Amp\async(fn() => $getProfile->query($actor));
}

[$errors, $profiles] = \Amp\Future\awaitAll($futures);
```