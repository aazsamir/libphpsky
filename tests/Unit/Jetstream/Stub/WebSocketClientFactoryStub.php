<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream\Stub;

use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactoryInterface;
use WebSocket\Client;

class WebSocketClientFactoryStub implements WebSocketClientFactoryInterface
{
    public function __construct(
        public Client $client,
    ) {}

    public function create(array $args): Client
    {
        return $this->client;
    }
}
