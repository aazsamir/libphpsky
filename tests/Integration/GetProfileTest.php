<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed;

class GetProfileTest extends TestCase
{
    public function testItGetsBskyProfile(): void
    {
        $profile = $this->client->appBskyActorGetProfile()->query('bsky.app');
        $this->assertEquals('bsky.app', $profile->handle);
    }

    public function testItGetsProfiles(): void
    {
        $profiles = $this->client->appBskyActorGetProfiles()->query([
            'bsky.app',
            'steampowered.com',
        ]);

        $this->assertCount(2, $profiles->profiles);
        $this->assertContainsOnlyInstancesOf(ProfileViewDetailed::class, $profiles->profiles);
        $this->assertEquals('bsky.app', $profiles->profiles[0]->handle);
        $this->assertEquals('steampowered.com', $profiles->profiles[1]->handle);
    }
}