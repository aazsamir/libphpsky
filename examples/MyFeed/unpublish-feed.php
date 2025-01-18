<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Examples\MyFeed\PublishFeed;

$feedService = new PublishFeed();
$feedService->unpublishFeed();
