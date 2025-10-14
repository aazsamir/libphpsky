<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Jetstream\WssClient;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Like\Like;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Post;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

$client = WssClient::default();

$eventsStream = $client->subscribe(
    wantedCollections: [
        Like::id(),
        Post::id(),
    ]
);

$max = 10000;

foreach ($eventsStream as $i => $event) {
    dump($event);

    if ($i > $max) {
        $client->stop();
    }
}
