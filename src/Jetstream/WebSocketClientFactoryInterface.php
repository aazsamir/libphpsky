<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

interface WebSocketClientFactoryInterface
{
    /**
     * @param array<string, mixed> $args
     */
    public function create(array $args): \WebSocket\Client;
}
