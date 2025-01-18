<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Examples\MyFeed\FeedGeneration;

$feedService = new FeedGeneration();
$feedService->run();
