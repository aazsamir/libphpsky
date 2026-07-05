<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Car\CarDeserializer;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Commit;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\SubscribeRepos;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$subscribeRepos = SubscribeRepos::default();
$subscription = $subscribeRepos
    ->withEndpoint('https://bsky.network')
    ->subscription();

$deserializer = CarDeserializer::default();

$count = 100;
foreach ($subscription->next() as $message) {
    if (!$message instanceof Commit) {
        continue;
    }

    $car = $deserializer->decodeString($message->blocks);
    dump([
        'message' => $message,
        'car' => $car,
    ]);

    if (--$count <= 0) {
        $subscription->stop();
    }
}
