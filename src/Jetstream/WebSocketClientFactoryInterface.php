<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

interface WebSocketClientFactoryInterface
{
    /**
     * @param array<string, mixed> $args
     * @param array<string, string> $headers
     */
    public function create(array $args, ?string $host = null, array $headers = []): \WebSocket\Client;
}
