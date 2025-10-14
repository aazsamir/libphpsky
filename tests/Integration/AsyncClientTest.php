<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed;

class AsyncClientTest extends TestCase
{
    public function testAsyncClientCanMakeRequests(): void
    {
        $futures = [];

        foreach (['bsky.app', 'steampowered.com'] as $actor) {
            $futures[] = \Amp\async(fn() => $this->asyncClient->appBskyActorGetProfile()->query($actor));
        }

        [$errors, $profiles] = \Amp\Future\awaitAll($futures);

        $this->assertCount(2, $profiles);
        $this->assertCount(0, $errors);
        $this->assertContainsOnlyInstancesOf(ProfileViewDetailed::class, $profiles);
    }
}