<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream\Stub;

use WebSocket\Client;
use WebSocket\Message\Close;
use WebSocket\Message\Message;

class WebSocketClientStub extends Client
{
    private int $last = 0;
    public bool $closed = false;

    public function __construct(
        /** @var Message[] */
        public array $messages = [],
    ) {}

    #[\Override]
    public function receive(): Message
    {
        if ($this->last >= \count($this->messages)) {
            $this->last = 0;
        }

        return $this->messages[$this->last++];
    }

    public function close(int $status = 1000, string $message = 'ttfn'): Close
    {
        $this->closed = true;

        return new Close($status, $message);
    }
}
