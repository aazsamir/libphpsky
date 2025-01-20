<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

use Aazsamir\Libphpsky\Jetstream\Model\Event;

interface Client
{
    /**
     * @param string[] $wantedCollections
     * @param string[] $wantedDids
     *
     * @return \Generator<int, Event>
     */
    public function subscribe(
        array $wantedCollections = [],
        array $wantedDids = [],
        ?int $maxMessageSizeBytes = null,
        ?string $cursor = null,
    ): \Generator;

    public function stop(): void;
}
