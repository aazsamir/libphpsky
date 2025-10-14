# Subscriptions

Libphpsky supports subscriptions over WebSockets, thanks to [`phrity/websocket`](https://github.com/sirn-se/websocket-php) and [Jetstream](https://github.com/bluesky-social/jetstream).

## Usage

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

So how does it work?

`WssClient` demands a `\Websocket\Client` instance, which is created by `WebSocketClientFactory`. The factory is responsible for creating a WebSocket client with the correct configuration.

It returns a `\Generator<int, Aazsamir\Libphpsky\Jetstream\Model\Event>` that can be iterated over to receive events.
The client can be stopped during by calling the `stop` method.

## Events

Right now, Jetstream supports the following events:

- Commit
    - Create
    - Update
    - Delete
- Account
- Identity

Check the [Jetstream repository](https://github.com/bluesky-social/jetstream) for more information on the events.

You can find the working example in the [examples/Subscriptions](https://github.com/aazsamir/libphpsky/tree/main/examples/LikesSubscribe) directory.