<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen as UpdateSeen;
use DateTimeImmutable;

class UpdateSeenTest extends TestCase
{
    public function testItUpdatesSeen(): void
    {
        $this->client->appBskyNotificationUpdateSeen()->procedure(
            UpdateSeen\Input::new(new DateTimeImmutable()),
        );
        $this->assertTrue(true);
    }
}