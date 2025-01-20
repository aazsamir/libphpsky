<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Like\Like;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

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
