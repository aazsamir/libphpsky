<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Operation;
use Aazsamir\Libphpsky\Model\App\Bsky\Graph\Follow\Follow;

class JetstreamTest extends TestCase
{
    public function testItGetsEvents(): void
    {
        $fired = false;

        foreach ($this->wssClient->subscribe() as $event) {
            $fired = true;
            break;
        }

        $this->assertTrue($fired);
    }

    public function testOnlyWantedCollectionsAreGotten(): void
    {
        $subscription = $this->wssClient->subscribe(
            wantedCollections: [
                Follow::ID,
            ],
        );

        $count = 5;
        $fired = false;

        foreach ($subscription as $event) {
            if (!$event instanceof CommitEvent) {
                continue;
            }

            if ($event->commit->operation !== Operation::CREATE) {
                continue;
            }

            $count--;
            $fired = true;
            $this->assertInstanceOf(Follow::class, $event->commit->record);

            if ($count <= 0) {
                break;
            }
        }

        $this->assertTrue($fired);
    }
}