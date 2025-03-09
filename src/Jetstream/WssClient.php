<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

class WssClient implements Client
{
    private bool $stop = false;

    public function __construct(
        private WebSocketClientFactoryInterface $clientFactory,
        private MessageAdapterInterface $messageAdapter,
    ) {}

    public function subscribe(
        array $wantedCollections = [],
        array $wantedDids = [],
        ?int $maxMessageSizeBytes = null,
        ?string $cursor = null,
        bool $compress = true,
    ): \Generator {
        $args = [];

        if ($wantedCollections) {
            $args['wantedCollections'] = $wantedCollections;
        }

        if ($wantedDids) {
            $args['wantedDids'] = $wantedDids;
        }

        if ($maxMessageSizeBytes) {
            $args['maxMessageSizeBytes'] = $maxMessageSizeBytes;
        }

        if ($cursor) {
            $args['cursor'] = $cursor;
        }

        if ($compress) {
            $args['compress'] = $compress;
        }

        $client = $this->clientFactory->create($args);

        while ($this->stop === false) {
            $message = $client->receive();

            yield $this->messageAdapter->adapt($message);
        }

        $this->stop = false;

        $client->close();
    }

    public function stop(): void
    {
        $this->stop = true;
    }
}
