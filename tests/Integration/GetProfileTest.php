<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed;

/**
 * @internal
 */
class GetProfileTest extends TestCase
{
    public function testItGetsBskyProfile(): void
    {
        $profile = $this->client->appBskyActorGetProfile()->query('bsky.app');
        self::assertEquals('bsky.app', $profile->handle);
    }

    public function testItGetsProfiles(): void
    {
        $profiles = $this->client->appBskyActorGetProfiles()->query([
            'bsky.app',
            'steampowered.com',
        ]);

        self::assertCount(2, $profiles->profiles);
        self::assertContainsOnlyInstancesOf(ProfileViewDetailed::class, $profiles->profiles);
        self::assertEquals('bsky.app', $profiles->profiles[0]->handle);
        self::assertEquals('steampowered.com', $profiles->profiles[1]->handle);
    }
}
