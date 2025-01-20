<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

interface WebSocketClientFactoryInterface
{
    public function create(array $args): \WebSocket\Client;
}
