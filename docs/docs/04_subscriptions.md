# Subscriptions

Libphpsky supports subscriptions over WebSockets, thanks to [`phrity/websocket`](https://github.com/sirn-se/websocket-php) and [Jetstream](https://github.com/bluesky-social/jetstream).

There are two ways to interact with subscriptions:

- using native atproto subscriptions (`com.atproto.sync.subscribeRepos`)
- using Jetstream subscriptions

If you only want to subscribe and listen to events, or you don't know what to choose - Jetstream is the way to go. It is a higher-level abstraction over the native subscriptions, and it is easier to use.

## Jetstream

```php
<?php
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Like\Like;

$factory = new WebSocketClientFactory();
$client = new WssClient($factory);

$eventsStream = $client->subscribe(
    wantedCollections: [
        Like::id(),
    ]
);

$max = 10000;

foreach ($eventsStream as $i => $event) {
    dump($event);

    if ($i > $max) {
        $client->stop();
    }
}
```

WssClient will connect to the Jetstream server and return a stream of events, in form of a generator.

The stream can be stopped during the iteration by calling the `stop` method.

### Events

Right now, Jetstream supports the following events:

- Commit
    - Create
    - Update
    - Delete
- Account
- Identity

Check the [Jetstream repository](https://github.com/bluesky-social/jetstream) for more information on the events.

You can find the working example in the [examples/Subscriptions](https://github.com/aazsamir/libphpsky/tree/main/examples/LikesSubscribe) directory.


## Native subscriptions

```php
<?php
$subscription = SubscribeRepos::default()
    ->subscription();

$max = 100;

foreach ($subscription->next() as $message) {
    dump($message);

    if ($i > $max) {
        $subscription->stop();
    }
}
```

Atproto subscriptions are lower-level than Jetstream, and they usually require CARv1 decoding of events.

```php
<?php
assert($message instanceof Commit);
$deserializer = CarDeserializer::default();
dump($deserializer->decodeString($message->blocks));
```