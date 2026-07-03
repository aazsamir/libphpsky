<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen\UpdateSeenInput;

/**
 * @internal
 */
class UpdateSeenTest extends TestCase
{
    public function testItUpdatesSeen(): void
    {
        $this->client->appBskyNotificationUpdateSeen()->procedure(
            UpdateSeenInput::new(new \DateTimeImmutable()),
        );
        self::assertTrue(true);
    }
}
